<x-layout>

    <x-slot:title>Cursos</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Cursos</h2>
            <a href="{{ route('cursos.create') }}" class="link-primary">Nueva</a>
        </div>
    </div>

    <div class="row">
        <div class="col fw-bold">Titulaci&oacute;n</div>
        <div class="col fw-bold">Asignatura</div>
        <div class="col-1 fw-bold">Matr&iacute;cula</div>
        <div class="col-1 fw-bold">Cr&eacute;ditos</div>
        <div class="col-1 fw-bold">Capacidad</div>
        <div class="col-1 fw-bold">Inscritos</div>
        <div class="col-2 fw-bold">Acciones</div>
    </div>
    @foreach ($asignaturas as $asignatura)
    <div class="row">
        <div class="col">
            <a href="{{ route('titulaciones.show', ['titulacion' => $asignatura->titulacion]) }}" class="link-info">
                {{ $asignatura->titulacion->nombre }}
            </a>
        </div>
        <div class="col">
            <a href="{{ route('asignaturas.show', ['asignatura' => $asignatura]) }}" class="link-info">
                {{ $asignatura->nombre }}
            </a>
        </div>
        <div class="col-1">
            <a href="{{ route('cursos.show', ['curso' => $asignatura]) }}" class="link-info">
                {{ $asignatura->matricula }}
            </a>
        </div>
        <div class="col-1">
            {{ $asignatura->creditos }}
        </div>
        <div class="col-1">
            {{ $asignatura->maximo }}
        </div>
        <div class="col-1">
            {{ $asignatura->alumnos->count() }}
        </div>
        <div class="col-2 d-flex">
            Actualizar
            <form method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la titulación?')){this.closest('form').submit()}">Borrar</a>
            </form>
        </div>
    </div>
    @endforeach

</x-layout>