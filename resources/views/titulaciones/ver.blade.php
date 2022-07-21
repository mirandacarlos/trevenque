<x-layout>
    <x-slot:title>Ver titulaci&oacute;n</x-slot:title>
    <div class="row">
        <div class="col text-center">
            <h2>Detalles de la titulación</h2>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Nombre</span>: {{ $titulacion->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">creado</span>: {{ $titulacion->created_at }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">actualizado</span>: {{ $titulacion->updated_at }}
                </div>
            </div>
        </div>
        <div class="col">
            <a href="{{ route('titulaciones.edit', ['titulacion' => $titulacion]) }}">Actualizar</a>
            <form action="{{ route('titulaciones.destroy', ['titulacion' => $titulacion]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger float-end" value="Borrar" onclick="return confirm('Desea borrar la titulación?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Asignaturas asociadas</h3>
        </div>
    </div>
    <!-- todo -->
</x-layout>