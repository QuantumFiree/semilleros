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
        // Agrega aquí los demás campos de la tabla proyectos
    ];

    // Nombre de la tabla en la base de datos
    protected $table = 'proyecto';

    // Nombre de la columna que es la clave primaria en la tabla
    protected $primaryKey = 'cod_proyecto';

    // Deshabilita el uso de los campos de timestamp (created_at y updated_at)
    public $timestamps = false;
}