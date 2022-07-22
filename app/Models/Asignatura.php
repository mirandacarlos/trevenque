<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'asignaturas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'creditos',
        'curso_academico',
        'maximo',
        'matricula',
        'titulacion_id'
    ];

    /**
     * Relacion con titulacion.
     */
    public function titulacion(){
        return $this->belongsTo(Titulacion::class);
    }
}
