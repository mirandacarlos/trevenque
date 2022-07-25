<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Curso;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Examen>
 */
class ExamenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cursos = Curso::all();
        $curso = $cursos->isEmpty() ?
            Curso::factory()->create :
            $cursos->random();
        return [
            'curso_id' => $curso->id,
            'convocatoria' => rand(1, 2),
            'calificacion' => rand(0, 20)
        ];
    }
}
