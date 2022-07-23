<x-layout>
    <x-slot:title>Ver Asignatura</x-slot:title>
    <div class="row">
        <div class="col">
            <a href="{{ route('asignaturas.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2>Detalles de la asignatura</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
        <div class="row">
                <div class="col">
                    <span class="fw-bold">Titulación</span>: {{ $asignatura->titulacion->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Nombre</span>: {{ $asignatura->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Matricula</span>: {{ $asignatura->matricula }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Cr&eacute;ditos</span>: {{ $asignatura->creditos }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Curso academico</span>: {{ $asignatura->curso_academico }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Alumnos m&aacute;ximo</span>: {{ $asignatura->maximo }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Creado</span>: {{ $asignatura->created_at }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Actualizado</span>: {{ $asignatura->updated_at }}
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <a href="{{ route('asignaturas.edit', ['asignatura' => $asignatura]) }}" class="btn btn-success me-2">Actualizar</a>
            <form action="{{ route('asignaturas.destroy', ['asignatura' => $asignatura]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Desea borrar la titulación?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Alumnos examinados</h3>
        </div>
    </div>
    <!-- todo -->
</x-layout>