<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod_evento',
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'lugar',
        'tipo',
        'modalidad',
        'clasificacion',
        'observaciones',
        'cod_semillero',

    ];

    protected $table = 'evento';
    protected $primaryKey = 'cod_evento';
    public $timestamps = false;

    public function semillero()
    {
        return $this->belongsTo(Semillero::class, 'cod_semillero');
    }
}
