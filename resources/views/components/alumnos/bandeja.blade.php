<div class="row">
    <div class="col-2 fw-bold">Nombre</div>
    <div class="col-3 fw-bold">Apellidos</div>
    <div class="col-2 fw-bold">A&ntilde;o de nacimiento</div>
    <div class="col-2 fw-bold">Asignaturas</div>
    @if ($acciones || isset($asignatura))
    <div class="col fw-bold">Acciones</div>
    @endif
</div>
@foreach ($alumnos as $alumno)
<div class="row">
    <div class="col-2">
        <a href="{{ route('alumnos.show', ['alumno' => $alumno]) }}" class="link-info">
            {{ $alumno->nombre }}
        </a>
    </div>
    <div class="col-3">{{ $alumno->apellidos }}</div>
    <div class="col-2">{{ $alumno->nacimiento }}</div>
    <div class="col-2">{{ $alumno->asignaturas->count() }}</div>
    @if ($acciones)
    <div class="col d-flex">
        <a href="{{ route('alumnos.edit', ['alumno' => $alumno]) }}" class="link-secondary me-2">Actualizar</a>
        <form action="{{ route('alumnos.destroy', ['alumno' => $alumno]) }}" method="POST">
            @csrf
            @method('DELETE')
            <a href="#" class="link-danger" onclick="if (confirm('Desea borrar el alumno?')){this.closest('form').submit()}">Borrar</a>
        </form>
    </div>
    @endif
    @if (isset($asignatura))
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