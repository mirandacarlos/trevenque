<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

    /**
     * Borrar Calificacion.
     * @param  \App\Models\Examen $examen
     * @return \Illuminate\Http\Response
     */
    public function borrarCalificacion(Examen $examen)
    {
        $examen->deleteOrFail();
        return back()->with('status', 'Calificación borrada');
    }

    /**
     * Guardar calificación.
     */
    public function calificar(Request $request)
    {
        return back()->with('status', 'Calificación guardada');
    }

    /**
     * Formulario calificación individual
     */
    function create(Request $request)
    {
        return view('examenes/formulario', [
            'curso' => Curso::where([
                'asignatura_id' => $request->asignatura,
                'alumno_id' => $request->alumno
            ])->first(),
            'convocatorias' => [1, 2]
        ]);
    }
}
