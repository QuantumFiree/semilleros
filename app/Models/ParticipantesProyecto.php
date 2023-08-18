<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ParticipantesProyectoController;

class ParticipantesProyecto extends Model
{
    protected $table = 'participantes_proyecto'; 

    protected $fillable = [
        'cod_proyecto', 'cod_semillerista',
    ];

}