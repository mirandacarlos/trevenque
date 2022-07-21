<x-layout>

    <x-slot:title>Titulaciones</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Titulaciones</h2>
            <a href="{{ route('titulaciones.create') }}">Nueva</a>
        </div>
        <!-- <div class="col">
            <a href="{{ route('titulaciones.create') }}">Nueva</a>
        </div> -->
    </div>

    <div class="row">
        <div class="col fw-bold">Nombre</div>
    </div>
    @foreach ($titulaciones as $titulacion)
    <div class="row">
        <div class="col">
            <a href="{{ route('titulaciones.show', ['titulacion' => $titulacion]) }}">
                {{ $titulacion->nombre }}
            </a>
        </div>
    </div>
    @endforeach

</x-layout>