<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class Productos extends Controller
{
    //
    public function index(){
        //Muestra el listado de productos
        $productos = DB::table('productos as pro')
                    ->join('categorias as cat', 'pro.categoria', '=', 'cat.id')
                    ->select('pro.id','pro.nombreProducto', 'pro.fotoProducto', 'cat.nombreCategoria')
                    ->get();
        return view('tienda.productos.productos', ['productos' => $productos]);

    }

    public function detalle($id) {
        $producto = Producto:: findOrFail($id);
        return view('inventario.productos.detalle', compact('producto'));

    }
}
