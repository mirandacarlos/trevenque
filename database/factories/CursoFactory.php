<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Asignatura;
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
        $alumnos = Alumno::all();
        $asignatura = $asignaturas->isEmpty() ?
            Asignatura::factory()->create() :
            $asignaturas->random();
        $alumno = $alumnos->isEmpty() ?
            Alumno::factory()->create() :
            $alumnos->random();
        return [
            'asignatura_id' => $asignatura->id,
            'alumno_id' => $alumno->id
        ];
    }
}
