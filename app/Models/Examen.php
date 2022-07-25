<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'examenes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['curso_id', 'convocatoria', 'calificacion'];

    /**
     * Relación con curso.
     * 
     */
    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
