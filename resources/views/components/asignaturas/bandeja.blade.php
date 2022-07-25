<div class="row">
    <div class="col-2 fw-bold">Titulación</div>
    <div class="col-2 fw-bold">Nombre</div>
    <div class="col-1 fw-bold">Matricula</div>
    <div class="col-1 fw-bold">Cr&eacute;ditos</div>
    <div class="col-2 fw-bold">Curso</div>
    <div class="col-1 fw-bold">Capacidad</div>
    <div class="col-1 fw-bold">Inscritos</div>
    @if ($acciones || isset($alumno))
    <div class="col fw-bold">Acciones</div>
    @endif
</div>
@foreach ($asignaturas as $asignatura)
<div class="row">
    <div class="col-2">
        <a href="{{ route('titulaciones.show', ['titulacion' => $asignatura->titulacion]) }}" class="link-info">
            {{ $asignatura->titulacion->nombre }}
        </a>
    </div>
    <div class="col-2">
        <a href="{{ route('asignaturas.show', ['asignatura' => $asignatura]) }}" class="link-info">
            {{ $asignatura->nombre }}
        </a>
    </div>
    <div class="col-1">{{ $asignatura->matricula }}</div>
    <div class="col-1">{{ $asignatura->creditos }}</div>
    <div class="col-2">{{ $asignatura->curso_academico }}</div>
    <div class="col-1">{{ $asignatura->maximo }}</div>
    <div class="col-1">{{ $asignatura->alumnos->count() }}</div>
    @if ($acciones)
    <div class="col d-flex">
        <a href="{{ route('asignaturas.edit', ['asignatura' => $asignatura]) }}" class="link-secondary me-2">Actualizar</a>
        <form action="{{ route('asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la asignatura?')){this.closest('form').submit()}">Borrar</a>
        </form>
    </div>
    @endif
    @if (isset($asignatura))
    <div class="col d-flex">
        <form action="{{ route('cursos.bajaAlumno', ['alumno_id' => $alumno->id, 'asignatura_id' => $asignatura->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="link-danger" onclick="if (confirm('Desea dar de baja al alumno de la asignatura? Se perderán las calificaciones')){this.closest('form').submit()}">Baja</a>
        </form>
    </div>
    @endif
</div>
@endforeach