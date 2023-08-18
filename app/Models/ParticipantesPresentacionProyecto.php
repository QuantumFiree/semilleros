<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantesPresentacionProyecto extends Model
{
    protected $table = 'participantes_presentacion_proyecto';

    protected $fillable = [
        'cod_presentacion_proyecto', 'cod_semillerista',
    ];

    public function presentacionProyecto()
    {
        return $this->belongsTo(PresentacionProyecto::class, 'cod_presentacion_proyecto');
    }

    public function semillerista()
    {
        return $this->belongsTo(Semillerista::class, 'cod_semillerista');
    }
}
