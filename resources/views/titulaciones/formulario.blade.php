<x-layout>
    <div class="row">
        <div class="col">
            <a href="{{ route('titulaciones.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    @if (!isset($titulacion->id))
    <x-slot:title>Nueva Titulación</x-slot:title>
    <h1>Nueva Titulación</h1>
    <form action="{{ route('titulaciones.store') }}" method="POST">
        @else
        <x-slot:title>Actualizar titulación</x-slot:title>
        <h1>Actualizar titulación</h1>
        <form action="{{ route('titulaciones.update', ['titulacion' => $titulacion]) }}" method="POST">
            @method('PUT')
            @endif
            @csrf

            <div class="row mb-3">
                <div class="col-9">
                    <label for="nombre" class="form-label">Nombre: </label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $titulacion->nombre) }}" />
                    @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input type="submit" value="{{ isset($titulacion->id) ? 'Actualizar' : 'Guardar'}}" class="btn btn-primary" />
                </div>
            </div>
        </form>
</x-layout>