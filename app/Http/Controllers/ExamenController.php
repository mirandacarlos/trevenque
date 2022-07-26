<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExamenRequest;
use App\Models\Curso;
use App\Models\Examen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $form = new ExamenRequest();
        $validator = Validator::make($request->all(), $form->rules(), $form->messages());
        if ($validator->fails()){
            return back()->with('error', $validator->errors()->all());
        }
        Examen::create($validator->validated());
        return back()->with('status', 'Calificación guardada');
    }

    /**
     * Formulario calificación individual
     */
    function create(Request $request)
    {
        $convocatorias = [1, 2];
        $curso = Curso::where([
            'asignatura_id' => $request->asignatura,
            'alumno_id' => $request->alumno
        ])->first();
        foreach ($curso->examenes as $examen){
            unset($convocatorias[array_search($examen->convocatoria, $convocatorias)]);
        }
        if (empty($convocatorias)){
            return 'El alumno ha sido calificado en todas las convocatorias';
        }
        return view('examenes/formulario', [
            'curso' => $curso,
            'convocatorias' => $convocatorias
        ]);
    }
}
