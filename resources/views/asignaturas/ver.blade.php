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
                <input type="submit" class="btn btn-danger" value="Borrar" onclick="return confirm('Desea borrar la asignatura?')" />
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col text-center">
            <h3>Alumnos inscritos</h3>
        </div>
    </div>
    
    <x-alumnos.bandeja :alumnos="$asignatura->alumnos" :acciones="false" :asignatura="$asignatura"></x-alumnos.bandeja>

    <div class="row">
        <div class="col text-center">
            <h3>Calificaciones</h3>
        </div>
    </div>

    <div class="row">
        <div class="col fw-bold">Nombre</div>
        <div class="col fw-bold">Apellidos</div>
        <div class="col fw-bold">Convocatoria</div>
        <div class="col fw-bold">Calificaci&oacute;n</div>
        <div class="col fw-bold">Acciones</div>
    </div>
    @foreach ($cursos as $curso)
    @if (isset($curso->examenes))
    @foreach ($curso->examenes as $examen)
    <div class="row">
        <div class="col">{{ $curso->alumno->nombre }}</div>
        <div class="col">{{ $curso->alumno->apellidos }}</div>
        <div class="col">{{ $examen->convocatoria }}</div>
        <div class="col">{{ $examen->calificacion }}</div>
        <div class="col">
            <form action="{{ route('examenes.borrarCalificacion', ['examen' => $examen]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="link-danger" onclick="if (confirm('Desea borrar la calificación?')){this.closest('form').submit()}">Borrar</a>
            </form>
        </div>
    </div>
    @endforeach
    @endif
    @endforeach

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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="enviarInscribir()">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function enviarInscribir() {
            document.getElementById('inscribirForm').submit()
        }
    </script>
    @push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    @endpush


</x-layout>