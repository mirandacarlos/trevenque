<x-layout>
    <div class="row">
        <div class="col">
            <a href="{{ route('alumnos.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    @if (!isset($alumno->id))
    <x-slot:title>Nuevo Alumno</x-slot:title>
    <h1>Nuevo Alumno</h1>
    <form action="{{ route('alumnos.store') }}" method="POST">
        @else
        <x-slot:title>Actualizar alumno</x-slot:title>
        <h1>Actualizar alumno</h1>
        <form action="{{ route('alumnos.update', ['alumno' => $alumno]) }}" method="POST">
            @method('PUT')
            @endif
            @csrf

            <div class="row mb-1">
                <div class="col-3">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $alumno->nombre) }}" />
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="apellidos" class="form-label">Apellidos: </label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" value="{{ old('apellidos', $alumno->apellidos) }}" />
                    @error('apellidos')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="row mb-1">
                <div class="col-3">
                    <label for="nacimiento" class="form-label">A&ntilde;o de nacimiento: </label>
                    <input type="text" name="nacimiento" id="nacimiento" class="form-control" value="{{ old('nacimiento', $alumno->nacimiento) }}" />
                    @error('nacimiento')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="{{ isset($alumno->id) ? 'Actualizar' : 'Guardar'}}" class="btn btn-primary" />
                </div>
            </div>
        </form>
</x-layout>