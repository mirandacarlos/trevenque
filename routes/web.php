<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\TitulacionController;
use App\Models\Examen;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::resource('titulaciones', TitulacionController::class)
    ->parameters(['titulaciones' => 'titulacion']);

Route::resource('asignaturas', AsignaturaController::class);

Route::resource('alumnos', AlumnoController::class);

Route::post('/cursos/inscribirAlumnos', [CursoController::class, 'inscribirAlumnos'])->name('cursos.inscribirAlumnos');

Route::post('/cursos/inscribirAsignaturas', [CursoController::class, 'inscribirAsignaturas'])->name('cursos.inscribirAsignaturas');

Route::delete('/cursos/bajaAlumno', [CursoController::class, 'bajaAlumno'])->name('cursos.bajaAlumno');

Route::delete('/examenes/borrarCalificacion/{examen}', [ExamenController::class, 'borrarCalificacion'])->name('examenes.borrarCalificacion');

Route::post('/examenes/calificar', [ExamenController::class, 'calificar'])->name('examenes.calificar');

Route::get('/examenes/create', [ExamenController::class, 'create'])->name('examenes.create');