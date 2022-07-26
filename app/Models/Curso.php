<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Curso extends Pivot
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cursos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['asignatura_id', 'alumno_id'];

    /**
     * Relación con examenes.
     * 
     */
    public function examenes(){
        return $this->hasMany(Examen::class, 'curso_id', 'id');
    }

    /**
     * Relación con asignatura.
     * 
     */
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }

    /**
     * Relación con alumno.
     * 
     */
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }
}
