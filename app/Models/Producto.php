<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $table = 'productos';

    public function category(){
        return $this->belongsTo(Categoria::class,'categoria','id');
    }
}
