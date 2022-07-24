<x-layout>
    <x-slot:title>Ver titulaci&oacute;n</x-slot:title>
    <div class="row">
        <div class="col">
            <a href="{{ route('titulaciones.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2>Detalles de la titulación</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Nombre</span>: {{ $titulacion->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Creado</span>: {{ $titulacion->created_at }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Actualizado</span>: {{ $titulacion->updated_at }}
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <a href="{{ route('titulaciones.edit', ['titulacion' => $titulacion]) }}" class="btn btn-success me-2">Actualizar</a>
            <form action="{{ route('titulaciones.destroy', ['titulacion' => $titulacion]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Desea borrar la titulación?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Asignaturas asociadas</h3>
        </div>
    </div>
    
    <x-asignaturas.bandeja :asignaturas="$titulacion->asignaturas" :acciones="false"></x-asignaturas.bandeja>

</x-layout>