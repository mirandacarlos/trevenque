<x-layout>
    <x-slot:title>Universidad de Granada</x-slot:title>
    <div class="row">
        <div class="col text-center">
            <h2>Bienvenido</h2>
        </div>
    </div>
    <div class="row">
        <div class="col text-center m-3 p-3">
            <a href="{{ route('titulaciones.index') }}">Titulaciones</a>
        </div>
        <div class="col text-center m-3 p-3">
            <a href="{{  route('asignaturas.index') }}">Asignaturas</a>
        </div>
        <div class="col text-center m-3 p-3">
            <a href="{{ route('alumnos.index') }}">Alumnos</a>
        </div>
    </div>
</x-layout>