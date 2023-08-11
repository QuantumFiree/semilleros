<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\PresentacionProyectoController;

class PresentacionProyecto extends Model
{
    protected $table = 'presentacion_proyecto';

    protected $primaryKey = 'cod_presentacion_proyecto';

    protected $fillable = [
        'participacion',
        'calificacion',
        'certificacion',
        'evidencias',
        'cod_evento',
        'cod_proyecto',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class, 'cod_evento');
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'cod_proyecto');
    }


}
