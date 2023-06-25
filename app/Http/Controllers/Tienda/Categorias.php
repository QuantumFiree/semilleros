<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class Categorias extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('tienda.categorias.categorias', ['categorias' => $categorias]);
    }
}
