<?php

namespace App\Http\Controllers;

use App\Models\Titulacion;
use App\Http\Requests\TitulacionRequest;
use Illuminate\Http\Request;

class TitulacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('titulaciones/lista', ['titulaciones' => Titulacion::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('titulaciones/formulario', [
            'titulacion' => new Titulacion()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TitulacionRequest $request)
    {
        Titulacion::create($request->validated());
        return redirect()
            ->route('titulaciones.index')
            ->with('status', 'Titulación creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function show(Titulacion $titulacion)
    {
        return view('titulaciones/ver', ['titulacion' => $titulacion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Titulacion $titulacion)
    {
        return view('titulaciones/formulario', [
            'titulacion' => $titulacion
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function update(TitulacionRequest $request, Titulacion $titulacion)
    {
        $titulacion->update($request->validated());
        return redirect()
            ->route('titulaciones.show', ['titulacion' => $titulacion])
            ->with('status', 'Titulación actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Titulacion  $titulacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Titulacion $titulacion)
    {
        $titulacion->deleteOrFail();
        return redirect()->route('titulaciones.index')
            ->with('status', 'Titulación borrada');
    }
}
