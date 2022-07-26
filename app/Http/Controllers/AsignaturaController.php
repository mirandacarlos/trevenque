<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Titulacion;
use App\Models\Alumno;
use App\Models\Curso;
use App\Http\Requests\AsignaturaRequest;

class AsignaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('asignaturas/lista', ['asignaturas' => Asignatura::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('asignaturas/formulario', [
            'asignatura' => new Asignatura(),
            'titulaciones' => Titulacion::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturaRequest $request)
    {
        Asignatura::create($request->validated());
        return redirect()
            ->route('asignaturas.index')
            ->with('status', 'Asignatura creada');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function show(Asignatura $asignatura)
    {
        $cursos = Curso::where('asignatura_id', $asignatura->id)->with('examenes')->get();
        return view('asignaturas/ver', [
            'asignatura' => $asignatura,
            'alumnos' => Alumno::whereNotIn(
                'id',
                Curso::select('alumno_id')
                    ->where('asignatura_id', $asignatura->id)->get()
            )->get(),
            'cursos' => $cursos
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas/formulario', [
            'asignatura' => $asignatura,
            'titulaciones' => Titulacion::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function update(AsignaturaRequest $request, Asignatura $asignatura)
    {
        $asignatura->update($request->validated());
        return redirect()
            ->route('asignaturas.show', ['asignatura' => $asignatura])
            ->with('status', 'Asignatura actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asignatura  $asignatura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asignatura $asignatura)
    {
        $asignatura->deleteOrFail();
        return redirect()->route('asignaturas.index')
            ->with('status', 'Asignatura borrada');
    }
}
