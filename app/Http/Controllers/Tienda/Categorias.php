<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class Categorias extends Controller
{
    public function index(){
        //Visualiza todas las categorias
        $categorias = Categoria::all();
        return view('tienda.categorias.categorias', ['categorias' => $categorias]);
    }

    public function form_registro()  {
        //Muestra el formulario de registro de una categoria
        return view('tienda.categorias.form_registro');
    }


    public function registrar(Request $request) {
        $category = new Categoria();
        $category->nombreCategoria = $request->input('nombreCat');
        $category->descripcion = $request->input('descripcionCat');
        $category->save();
        return redirect()->route('categorias');
    }

    public function form_actualiza($id){
        // Funcion que genera el formulario de actualizacion con base en la categoria seleccionada
        $categoria = Categoria::findOrFail($id);
        return view ('tienda.categorias.form_actualiza', compact('categoria'));
    }

    public function actualizar(Request $request, $id)
    {
        $c = Categoria::findOrFail($id);
        $c->nombreCategoria = $request->input('nombreCat');
        $c->descripcion = $request->input('descripcionCat');
        $c->save();
        return redirect()->route('categorias');
    }

    public function eliminar($id)
    {
        $c = Categoria::findOrFail($id);
        $c->delete();
        return redirect()->route('categorias');
    }

}
