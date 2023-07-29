<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorModel extends Model
{
    protected $fillable = [
        'direccion',
        'telefono',
        'area_conocimiento'
        // Agrega otros campos que necesitas actualizar aquí...
    ];
    protected $table = 'coordinador';
    protected $primaryKey = 'cod_coordinador';
    public $timestamps = true;
}
