<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tienda\Productos;
use App\Http\Controllers\Tienda\Categorias;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas Categorias
    Route::get('/categorias', [Categorias::class, 'index'])->name('categorias');

    Route::get('categorias/registro', [Categorias::class, 'form_registro'])
    ->name('form_registroCategoria');

    Route::post('categorias/registro', [Categorias::class, 'registrar'])
    ->name('registrarCategoria');

    Route::get('categorias/actualizar/{id}', [Categorias::class, 'form_actualiza'])
    ->name('form_actualizaCategoria');

    Route::post('categorias/actualizar/{id}', [Categorias::class, 'actualizar'])
    ->name('actualizarCategoria');

    Route::get('categorias/eliminar/{id}', [Categorias::class, 'eliminar'])
    ->name('eliminarCategoria');


    // Rutas Productos

    Route::get('productos', [Productos::class, 'index'] )->name('productos');

    Route::get('productos/detalle/{id}', [Productos::class, 'detalle'] )->name('detalleProducto');;

    Route::get('productos/actualizar/{id}', [Productos::class, 'formularioAct'])->name('form_actualizaProducto');

    Route::post('productos/actualizar/{id}', [Productos::class, 'actualizar'])->name('actualizarProducto');

    Route::get('productos/eliminar/{id}', [Productos::class, 'eliminar'])->name('eliminarProducto');

});
