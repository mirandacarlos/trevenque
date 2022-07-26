<?php

namespace App\Http\Controllers;

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
}
