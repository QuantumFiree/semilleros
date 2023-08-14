<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorModel extends Model
{
    protected $fillable = [
        'nombres',
        'apellidos',
        'identificacion',
        'direccion',
        'telefono',
        'genero',
        'fecha_nacimiento',
        'cod_programa_academico',
        'cod_docente',
        'area_conocimiento',
        'fecha_vinculacion',
        'acuerdo_nombramiento'
        // Agrega otros campos que necesitas actualizar aquí...
    ];
    protected $table = 'coordinador';
    protected $primaryKey = 'cod_coordinador';
    public $timestamps = true;
}
