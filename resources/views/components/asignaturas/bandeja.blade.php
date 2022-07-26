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
    @if (isset($alumno))
    <div class="col d-flex">
        <a href="#" class="link-secondary me-2" onclick="cargarFormulario({{ $asignatura->id }}, {{ $alumno->id }})">Calificar</a>
        <form action="{{ route('cursos.bajaAlumno', ['alumno_id' => $alumno->id, 'asignatura_id' => $asignatura->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="link-danger" onclick="if (confirm('Desea dar de baja al alumno de la asignatura? Se perderán las calificaciones')){this.closest('form').submit()}">Baja</a>
        </form>
    </div>
    @endif
</div>
@endforeach

<div class="modal fade" id="calificarModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="calificarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Calificar alumno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="enviarCalificar()">Guardar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function enviarCalificar() {
            document.getElementById('calificarForm').submit()
        }
</script>
@push('scripts')
<script>
    const myModal = new bootstrap.Modal(document.getElementById('calificarModal'));

    function cargarFormulario(asignatura, alumno) {
        $('#calificarModal .modal-body').load("/examenes/create?asignatura=" + asignatura + "&alumno=" + alumno, function() {
            myModal.show();
        });
    }
</script>
@endpush