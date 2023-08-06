<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramaModel extends Model
{
    protected $table = 'programa';
    protected $primaryKey = 'cod_programa_academico';
    public $timestamps = true;
}
