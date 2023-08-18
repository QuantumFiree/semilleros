<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_proyecto',
        'titulo',
        'cod_semillero',
        'tipo_proyecto',
        'estado',
        'fecha_inicio',
        'fecha_finalizacion',
        'propuesta',
        'proyecto_final',
    ];

    protected $table = 'proyecto';
    protected $primaryKey = 'cod_proyecto';
    public $timestamps = false;


    public function semillero()
    {
        return $this->belongsTo(Semillero::class, 'cod_semillero');
    }
}
