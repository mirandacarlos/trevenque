<x-layout>

    <x-slot:title>Asignaturas</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Asignaturas</h2>
            <a href="{{ route('asignaturas.create') }}" class="link-primary">Nueva</a>
        </div>
    </div>

    <x-asignaturas.bandeja :asignaturas="$asignaturas" :acciones="true"></x-asignaturas.bandeja>

</x-layout>