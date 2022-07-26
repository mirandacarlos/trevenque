<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Guardar inscripción de alumnos a una asignatura.
     * 
     */
    public function inscribirAlumnos(Request $request)
    {
        if ($request->has('alumno_id')) {
            $asignatura = Asignatura::find($request->asignatura_id);
            if (count($request->alumno_id) <= $asignatura->maximo - $asignatura->alumnos->count()) {
                foreach ($request->alumno_id as $id) {
                    Curso::create(['asignatura_id' => $request->asignatura_id, 'alumno_id' => $id]);
                }
                return back()->with('status', 'Alumnos inscritos en la asignatura');
            }
            return back()->with('error', ['Las inscripciones superan la capacidad de la asignatura']);
        }
        return back()->with('error', ['Debe seleccionar al menos un alumno']);
    }

    /**
     * Guardar inscripciones de asignaturas a un alumno.
     * 
     */
    public function inscribirAsignaturas(Request $request)
    {
        if ($request->has('asignatura_id')) {
            foreach ($request->asignatura_id as $id) {
                Curso::create(['asignatura_id' => $id, 'alumno_id' => $request->alumno_id]);
            }
            return back()->with('status', 'Se ha inscrito al alumno en las asignaturas');
        }
        return back()->with('error', ['Debe seleccionar al menos una asignatura']);
    }

    /**
     * Dar de baja a un alumno de una asignatura
     * 
     */
    public function bajaAlumno(Request $request)
    {
        Curso::where('alumno_id', $request->alumno_id)
            ->where('asignatura_id', $request->asignatura_id)
            ->first()->deleteOrFail();
        return back()->with('status', 'Alumno dado de baja de la asignatura');
    }
}
