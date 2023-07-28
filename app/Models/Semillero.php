<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semillero extends Model
{
    use HasFactory;

    protected $primaryKey = 'cod_semillero';
    public $incrementing = false; // Indica que el campo 'cod_semillero' no es autoincremental
    protected $keyType = 'string'; // Indica el tipo de dato del campo 'cod_semillero'
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
        'logo', // la imagen del logo
        'cod_coordinador', // Código del coordinador encargado del semillero
    ];

    // Definir la relación con el coordinador encargado
   // public function coordinador()
    //{
        //return $this->belongsTo(Coordinador::class, 'cod_coordinador', 'cod_coordinador');
    //}
}
