<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'alumnos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'nacimiento'
    ];

    /**
     * Relacion con asignaturas.
     * 
     */
    public function asignaturas(){
        return $this->belongsToMany(Asignatura::class, 'cursos')->using(Curso::class);
    }

    /**
     * Relación con cursos.
     * 
     */
    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}
