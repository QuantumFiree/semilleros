<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
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
=======
class SemilleristaModel extends Model
{
    protected $fillable = [
        'direccion',
        'telefono',
        // Agrega otros campos que necesitas actualizar aquí...
    ];
    protected $table = 'semillerista';
    protected $primaryKey = 'cod_semillerista';
    public $timestamps = true;
>>>>>>> c54fe97e4f2a22c9a935e87a321e9d42e327a735
}
