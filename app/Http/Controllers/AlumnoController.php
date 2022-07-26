<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\AlumnoRequest;
use App\Models\Asignatura;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('alumnos/lista', ['alumnos' => Alumno::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnos/formulario', [
            'alumno' => new Alumno()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoRequest $request)
    {
        Alumno::create($request->validated());
        return redirect()
            ->route('alumnos.index')
            ->with('status', 'Alumno creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        $asignaturas = Asignatura::whereNotIn(
            'id',
            Curso::select('asignatura_id')
                ->where('alumno_id', $alumno->id)->get()
        )->get()->reject(function ($asignatura){
            return $asignatura->maximo <= $asignatura->alumnos->count();
        });
        $cursos = Curso::where('alumno_id', $alumno->id)->with('examenes')->get();
        return view('alumnos/ver', [
            'alumno' => $alumno,
            'asignaturas' => $asignaturas,
            'cursos' => $cursos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        return view('alumnos/formulario', [
            'alumno' => $alumno
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->validated());
        return redirect()
            ->route('alumnos.show', ['alumno' => $alumno])
            ->with('status', 'Alumno actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->deleteOrFail();
        return redirect()->route('alumnos.index')
            ->with('status', 'Alumno borrado');
    }
}
