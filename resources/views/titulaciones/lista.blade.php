<x-layout>

    <x-slot:title>Titulaciones</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Titulaciones</h2>
            <a href="{{ route('titulaciones.create') }}" class="link-primary">Nueva</a>
        </div>
    </div>

    <div class="row">
        <div class="col-4 fw-bold">Nombre</div>
        <div class="col-2 fw-bold">Asignaturas</div>
        <div class="col fw-bold">Acciones</div>
    </div>
    @foreach ($titulaciones as $titulacion)
    <div class="row">
        <div class="col-4">
            <a href="{{ route('titulaciones.show', ['titulacion' => $titulacion]) }}" class="link-info">
                {{ $titulacion->nombre }}
            </a>
        </div>
        <div class="col-2">{{ $titulacion->asignaturas->count() }}</div>
        <div class="col d-flex">
            <a href="{{ route('titulaciones.edit', ['titulacion' => $titulacion]) }}" class="link-secondary me-2">Actualizar</a>
            <form action="{{ route('titulaciones.destroy', ['titulacion' => $titulacion]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la titulación?')){this.closest('form').submit()}">Borrar</a>
            </form>
        </div>
    </div>
    @endforeach

</x-layout>