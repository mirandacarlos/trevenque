<x-layout>
    <x-slot:title>Universidad de Granada</x-slot:title>
    <div class="row">
        <div class="col text-center">
            <h2>Bienvenido</h2>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <a href="{{ route('titulaciones.index') }}">Titulaciones</a>
        </div>
        <div class="col text-center">
            <a href="#">Asignaturas</a>
        </div>
        <div class="col text-center">
            <a href="#">Cursos</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <a href="#">Alumnos</a>
        </div>
        <div class="col text-center">
            <a href="">Examenes</a>
        </div>
        <div class="col"></div>
    </div>
</x-layout>