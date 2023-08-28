<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ParticipantesProyectoController;

class ParticipantesProyecto extends Model
{
    protected $table = 'participantes_proyecto';
    protected $primaryKey = null; // Indicar que no tienes una clave primaria "id"

    public $incrementing = false;

    protected $fillable = [
        'cod_proyecto', 'cod_semillerista',
    ];

}
