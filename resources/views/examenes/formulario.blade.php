<p class="form-text">
{{ $curso->alumno->nombre.' '.$curso->alumno->apellidos }}
</p>
<form id="calificarForm" action="{{ route('examenes.calificar') }}" method="POST">
    @csrf
    <input type="hidden" name="curso_id" value="{{ $curso->id }}">
    <label for="convocatoria" class="form-label">Convocatoria:</label>
    <select name="convocatoria" id="convocatoria" class="form-select">
        <option value="">Seleccione</option>
        @foreach ($convocatorias as $convocatoria)
        <option value="{{ $convocatoria }}">{{ $convocatoria }}</option>
        @endforeach
    </select>
    <label for="calificacion" class="form-label">Calificaci&oacute;n:</label>
    <input type="text" name="calificacion" id="calificacion" class="form-control">
</form>