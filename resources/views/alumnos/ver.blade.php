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
            <button id="inscribir" @class([ "btn" , "btn-primary" , "me-2" , "disabled"=> count($asignaturas) == 0
                ]) data-bs-toggle="modal" data-bs-target="#inscribirModal">Inscribir</button>
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

    <x-asignaturas.bandeja :asignaturas="$alumno->asignaturas" :acciones="false" :alumno="$alumno"></x-asignaturas.bandeja>

    <div class="modal fade" id="inscribirModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="inscribirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inscribir asignaturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="inscribirForm" action="{{ route('cursos.inscribirAsignaturas') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alumno_id" value="{{ $alumno->id }}">
                        @foreach ($asignaturas as $asignatura)
                        <div class="form-check">
                            <input name="asignatura_id[]" id="{{ $asignatura->id }}" class="form-check-input" type="checkbox" value="{{ $asignatura->id }}">
                            <label class="form-check-label" for="{{ $asignatura->id }}">
                                {{ $asignatura->titulacion->nombre.' - '.$asignatura->nombre}}
                            </label>
                        </div>
                        @endforeach
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="enviar()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function enviar() {
            document.getElementById('inscribirForm').submit()
        }
    </script>

</x-layout>