<x-layout>
    <x-slot:title>Ver alumno</x-slot:title>
    <div class="row">
        <div class="col">
            <a href="{{ route('alumnos.index') }}" class="link-secondary float-end">Volver al listado</a>
        </div>
    </div>
    <div class="row">
        <div class="col text-center">
            <h2>Detalles del alumno</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Nombre</span>: {{ $alumno->nombre }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Apellidos</span>: {{ $alumno->apellidos }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">A&ntilde;o de nacimiento</span>: {{ $alumno->nacimiento }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Creado</span>: {{ $alumno->created_at }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Actualizado</span>: {{ $alumno->updated_at }}
                </div>
            </div>
        </div>
        <div class="col d-flex align-items-center">
            <a href="{{ route('alumnos.edit', ['alumno' => $alumno]) }}" class="btn btn-success me-2">Actualizar</a>
            <form action="{{ route('alumnos.destroy', ['alumno' => $alumno]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Desea borrar la titulación?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Asignaturas que cursa</h3>
        </div>
    </div>
    
    <x-asignaturas.bandeja :asignaturas="$alumno->asignaturas" :acciones="false"></x-asignaturas.bandeja>

</x-layout>