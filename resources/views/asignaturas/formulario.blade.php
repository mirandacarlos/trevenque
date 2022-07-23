<x-layout>
    <div class="row">
        <div class="col">
            <a href="{{ route('asignaturas.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    @if (!isset($asignatura->id))
    <x-slot:title>Nueva asignatura</x-slot:title>
    <h1>Nueva asignatura</h1>
    <form action="{{ route('asignaturas.store') }}" method="POST">
        @else
        <x-slot:title>Actualizar asignatura</x-slot:title>
        <h1>Actualizar asignatura</h1>
        <form action="{{ route('asignaturas.update', ['asignatura' => $asignatura]) }}" method="POST">
            @method('PUT')
            @endif
            @csrf
            <input type="hidden" name="id" value="{{ $asignatura->id }}">
            <div class="row mb-1">
                <div class="col-3">
                    <label for="titulacion_id" class="form-label">Titulaci&oacute;n: </label>
                    <select name="titulacion_id" id="titulacion_id" class="form-select">
                        <option value="">Seleccione</option>
                        @foreach ($titulaciones as $titulacion)
                        <option value="{{ $titulacion->id }}" {{ old('titulacion_id', $asignatura->titulacion_id) == $titulacion->id ? 'selected' : '' }}>{{ $titulacion->nombre }}</option>
                        @endforeach
                    </select>
                    @error('titulacion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $asignatura->nombre) }}" />
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="matricula" class="form-label">Matr&iacute;cula: </label>
                    <input type="text" name="matricula" id="matricula" class="form-control" value="{{ old('matricula', $asignatura->matricula) }}" placeholder="Ej. 12345678" />
                    <div class="form-text">Debe contener 8 d&iacute;gitos</div>
                    @error('matricula')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="creditos" class="form-label">Cr&eacute;ditos: </label>
                    <input type="text" name="creditos" id="creditos" class="form-control" value="{{ old('creditos', $asignatura->creditos) }}" />
                    @error('creditos')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="curso_academico" class="form-label">Curso acad&eacute;mico: </label>
                    <input type="text" name="curso_academico" id="curso_academico" class="form-control" value="{{ old('curso_academico', $asignatura->curso_academico) }}" placeholder="Ej. 2022-2023" />
                    <div class="form-text">A&ntilde;os que abarca el curso</div>
                    @error('curso_academico')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="maximo" class="form-label">Capacidad: </label>
                    <input type="text" name="maximo" id="maximo" class="form-control" value="{{ old('maximo', $asignatura->maximo) }}" />
                    @error('maximo')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="{{ isset($asignatura->id) ? 'Actualizar' : 'Guardar'}}" class="btn btn-primary" />
                </div>
            </div>
        </form>
</x-layout>