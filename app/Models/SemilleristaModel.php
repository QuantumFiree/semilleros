<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorModel extends Model
{
    use HasFactory;
    protected $table = 'semillerista';
    protected $primaryKey = 'cod_semillerista';
    public $timestamps = true;

    protected $fillable = [
        'cod_user',
        'nombres',
        'apellidos',
        'identificacion',
        'direccion',
        'telefono',
        'genero',
        'fecha_nacimiento',
        'foto',
        'cod_programa_academico',
        'cod_docente',
        'area_conocimiento',
        'fecha_vinculacion',
        'acuerdo_nombramiento',
        'estado',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'cod_user');
    }
}
