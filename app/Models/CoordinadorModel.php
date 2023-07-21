<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoordinadorModel extends Model
{
    protected $table = 'coordinador';
    protected $primaryKey = 'cod_coordinador';
    public $timestamps = true;
}
