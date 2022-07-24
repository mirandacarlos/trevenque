<x-layout>

    <x-slot:title>Alumnos</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Alumnos</h2>
            <a href="{{ route('alumnos.create') }}" class="link-primary">Nuevo</a>
        </div>
    </div>

    <x-alumnos.bandeja :alumnos="$alumnos" :acciones="true"></x-alumnos.bandeja>

</x-layout>