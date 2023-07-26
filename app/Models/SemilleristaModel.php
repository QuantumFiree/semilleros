<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemilleristaModel extends Model
{
    protected $table = 'semillerista';
    protected $primaryKey = 'cod_semillerista';
    public $timestamps = true;
}
