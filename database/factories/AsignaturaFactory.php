<?php

namespace Database\Factories;

use App\Models\Titulacion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $year = date('Y');
        $titulaciones = Titulacion::all();
        $titulacion = $titulaciones->isEmpty() ?
            Titulacion::factory()->create() :
            $titulaciones->random();

        return [
            'nombre' => $this->faker->words(rand(1, 3), true),
            'creditos' => rand(1, 10),
            'curso_academico' => $year.' - '.$year + 1,
            'maximo' => rand(1, 20),
            'titulacion_id' => $titulacion
        ];
    }
}
