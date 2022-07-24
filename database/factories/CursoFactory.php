<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $asignaturas = Asignatura::all();
        $asignatura = $asignaturas->isEmpty() ?
            Asignatura::factory()->create() :
            $asignaturas->random();
        $alumnos = Alumno::whereNotIn(
            'id',
            Curso::select('alumno_id')
                ->where('asignatura_id', $asignatura->id)->get()
        )->get();
        $alumno = $alumnos->isEmpty() ?
            Alumno::factory()->create() :
            $alumnos->random();
        return [
            'asignatura_id' => $asignatura->id,
            'alumno_id' => $alumno->id
        ];
    }
}
