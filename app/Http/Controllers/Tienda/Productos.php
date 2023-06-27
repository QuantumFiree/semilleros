<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
class Productos extends Controller
{
    //
    public function index(){
        //Muestra el listado de productos

        $productos = Producto::all();
        return view('tienda.productos.productos', ['productos' => $productos]);

    }

    public function detalle($id) {
        $producto = Producto:: findOrFail($id);
        return view('tienda.productos.detalle', compact('producto'));

    }

    public function formularioAct($id){
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
        return view('tienda.productos.form_actualiza', compact('producto','categorias'));
    }


    public function actualizar(Request $request, $id){
        // Realizar la actualizacion en la base de datos
        $product = Producto::findOrFail($id);
        $product->nombreProducto = $request->input('nombrePro');
        $product->cantidadProducto = $request->input('cantidadPro');
        $product->precioProducto = $request->input('precioPro');
        $product->categoria = $request->input('categorias');
        $product->save();
        return redirect()->route('productos');
    }

    public function eliminar($id){
        $product = Producto::findOrFail($id);
        $product->delete();
        return redirect()->route('productos');
    }

}
