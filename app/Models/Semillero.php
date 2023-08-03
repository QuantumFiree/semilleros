<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillero extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_semillero';
    public $incrementing = false; 
    protected $keyType = 'string'; 
    protected $table = 'semillero';
    protected $fillable = [
        'cod_semillero',
        'nombre',
        'correo',
        'descripcion',
        'mision',
        'vision',
        'valores',
        'objetivo',
        'lineas_investigacion',
        'presentacion',
        'fecha_creacion',
        'numero_resolucion',
        'logo', 
        'cod_coordinador', 
    ];
   public function coordinador()
    {
        return $this->belongsTo(Coordinador::class, 'cod_coordinador', 'cod_coordinador');
    }
}
