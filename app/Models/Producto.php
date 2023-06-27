<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $table = 'productos';

    public function category(){
        // Función que realiza la relación que tiene un producto con su categoria
        return $this->belongsTo(Categoria::class,'categoria','id');
    }

    public function stock(){
        // Función que retorna la cantidad de productos
        return $this->cantidadProducto <= 10;
    }

    public static function findPrice($price){
        return static::where('precioProducto','=', $price)->first();
    }
}
