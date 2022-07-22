<x-layout>

    <x-slot:title>Asignaturas</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Asignaturas</h2>
            <a href="{{ route('asignaturas.create') }}" class="link-primary">Nueva</a>
        </div>
    </div>

    <div class="row">
        <div class="col-2 fw-bold">Titulación</div>
        <div class="col-2 fw-bold">Nombre</div>
        <div class="col-2 fw-bold">Cr&eacute;ditos</div>
        <div class="col-2 fw-bold">Curso academico</div>
        <div class="col-2 fw-bold">Capacidad</div>
        <div class="col fw-bold">Acciones</div>
    </div>
    @foreach ($asignaturas as $asignatura)
    <div class="row">
        <div class="col-2">
            <a href="{{ route('titulaciones.show', ['titulacion' => $asignatura->titulacion]) }}" class="link-info">
                {{ $asignatura->titulacion->nombre }}
            </a>
        </div>
        <div class="col-2">
            <a href="{{ route('asignaturas.show', ['asignatura' => $asignatura]) }}" class="link-info">
                {{ $asignatura->nombre }}
            </a>
        </div>
        <div class="col-2">{{ $asignatura->creditos }}</div>
        <div class="col-2">{{ $asignatura->curso_academico }}</div>
        <div class="col-2">{{ $asignatura->maximo }}</div>
        <div class="col d-flex">
            <a href="{{ route('asignaturas.edit', ['asignatura' => $asignatura]) }}" class="link-secondary me-2">Actualizar</a>
            <form action="{{ route('asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la asignatura?')){this.closest('form').submit()}">Borrar</a>
            </form>
        </div>
    </div>
    @endforeach

</x-layout>