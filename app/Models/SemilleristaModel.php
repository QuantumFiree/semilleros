<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SemilleristaModel extends Model
{
    protected $fillable = [
        'direccion',
        'telefono',
        'genero',
        'reporte_matricula',
        'nombres'
        // Agrega otros campos que necesitas actualizar aquí...
    ];
    protected $table = 'semillerista';
    protected $primaryKey = 'cod_semillerista';
    public $timestamps = true;
}
