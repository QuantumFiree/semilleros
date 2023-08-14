<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SemilleristaModel extends Model
{
    protected $fillable = [
        'cod_semillerista',
        'nombres',
        'apellidos',
        'identificacion',
        'direccion',
        'telefono',
        'genero',
        'fecha_nacimiento',
        'cod_programa_academico',
        'cod_estudiantil',
        'semestre',
        'fecha_vinculacion',
        'cod_semillero',
        'reporte_matricula'
        // Agrega otros campos que necesitas actualizar aquí...
    ];
    protected $table = 'semillerista';
    protected $primaryKey = 'cod_semillerista';
    public $timestamps = true;
}
