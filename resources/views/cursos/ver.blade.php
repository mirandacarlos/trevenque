<x-layout>
    <x-slot:title>Ver Curso</x-slot:title>
    <div class="row">
        <div class="col">
            <a href="{{ route('cursos.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2>Detalles del curso</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Titulaci&oacute;n</span>: {{ $asignatura->titulacion->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Asignatura</span>: {{ $asignatura->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Matr&iacute;cula</span>: {{ $asignatura->matricula }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Cr&eacute;ditos</span>: {{ $asignatura->creditos }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Capacidad</span>: {{ $asignatura->maximo }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Inscritos</span>: {{ $asignatura->alumnos->count() }}
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <a href="#" class="btn btn-success me-2">Actualizar</a>
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Desea borrar la titulación?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Alumnos inscritos</h3>
        </div>
    </div>

    <x-alumnos.bandeja :alumnos="$asignatura->alumnos" :acciones="false"></x-alumnos.bandeja>
    
</x-layout>