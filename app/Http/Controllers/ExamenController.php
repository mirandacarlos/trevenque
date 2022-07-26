<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{

    /**
     * Borrar Calificacion.
     * 
     */
    public function borrarCalificacion(Examen $examen)
    {
        $examen->deleteOrFail();
        return back()->with('status', 'Calificación borrada');
    }
}
