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
                    <span class="fw-bold">Curso acad&eacute;mico</span>: {{ $asignatura->curso_academico }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Alumnos m&aacute;ximos</span>: {{ $asignatura->maximo }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <span class="fw-bold">Alumnos inscritos</span>: {{ $asignatura->alumnos->count() }}
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
            <button id="inscribir" @class([ "btn" , "btn-primary" , "me-2" , "disabled"=> $asignatura->maximo <= $asignatura->alumnos->count()
                    ]) data-bs-toggle="modal" data-bs-target="#inscribirModal">Inscribir</button>
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
            <h3>Alumnos inscritos</h3>
        </div>
    </div>
    
    <x-alumnos.bandeja :alumnos="$asignatura->alumnos" :acciones="false" :asignatura="$asignatura"></x-alumnos.bandeja>

    <div class="modal fade" id="inscribirModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="inscribirModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Inscribir alumnos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="form-text">{{ $asignatura->maximo - $asignatura->alumnos->count() }} cupos disponibles</p>
                    <form id="inscribirForm" action="{{ route('cursos.inscribirAlumnos') }}" method="POST">
                        @csrf
                        <input type="hidden" name="asignatura_id" value="{{ $asignatura->id }}">
                        @foreach ($alumnos as $alumno)
                        <div class="form-check">
                            <input name="alumno_id[]" id="{{ $alumno->id }}" class="form-check-input" type="checkbox" value="{{ $alumno->id }}">
                            <label class="form-check-label" for="{{ $alumno->id }}">
                                {{ $alumno->nombre.' '.$alumno->apellidos }}
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