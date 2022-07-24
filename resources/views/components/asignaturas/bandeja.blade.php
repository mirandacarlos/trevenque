<div class="row">
    <div class="col-2 fw-bold">Titulación</div>
    <div class="col-2 fw-bold">Nombre</div>
    <div class="col-2 fw-bold">Matricula</div>
    <div class="col-1 fw-bold">Cr&eacute;ditos</div>
    <div class="col-2 fw-bold">Curso acad&eacute;mico</div>
    <div class="col-1 fw-bold">Capacidad</div>
    @if ($acciones)
    <div class="col-2 fw-bold">Acciones</div>
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
    <div class="col-2">{{ $asignatura->matricula }}</div>
    <div class="col-1">{{ $asignatura->creditos }}</div>
    <div class="col-2">{{ $asignatura->curso_academico }}</div>
    <div class="col-1">{{ $asignatura->maximo }}</div>
    @if ($acciones)
    <div class="col-2 d-flex">
        <a href="{{ route('asignaturas.edit', ['asignatura' => $asignatura]) }}" class="link-secondary me-2">Actualizar</a>
        <form action="{{ route('asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la asignatura?')){this.closest('form').submit()}">Borrar</a>
        </form>
    </div>
    @endif
</div>
@endforeach