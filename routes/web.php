<?php

use App\Http\Controllers\ControllerSemillerista;
use App\Http\Controllers\ControllerCoordinador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tienda\Productos;
use App\Http\Controllers\Tienda\Categorias;
use App\Http\Controllers\SemilleroController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PresentacionProyectoController;
use App\Http\Controllers\ParticipantesProyectoController;

use App\Models\User;
use Illuminate\Support\Facades\Console;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;


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
    'verified',
    'auth'
])->group(function () {
    // Rutas semillero
    // Rutas coordinador
    Route::get('/registro/coordinador', [ControllerCoordinador::class, 'registroView'])->name('registroCoordinador');
    Route::post('/registro/coordinador', [ControllerCoordinador::class, 'registro'])->name('registroCoordinador');
    Route::get('/perfil/coordinador/editar_datos_personales', [ControllerCoordinador::class, 'datosPersonalesView'])->name('perfilCoordinador');
    Route::post('/perfil/coordinador/editar_datos_personales', [ControllerCoordinador::class, 'datosPersonales'])->name('perfilCoordinador');

    // Rutas semillerista
    Route::get('/registro/semillerista', [ControllerSemillerista::class, 'registroView'])->name('registroSemillerista');
    Route::post('/registro/semillerista', [ControllerSemillerista::class, 'registro'])->name('registroSemillerista');
    Route::get('/perfil/semillerista/editar_datos_personales', [ControllerSemillerista::class, 'datosPersonalesView'])->name('perfilSemillerista');
    Route::post('/perfil/semillerista/editar_datos_personales', [ControllerSemillerista::class, 'datosPersonales'])->name('perfilSemillerista');

    Route::get('/semilleristas/listado', [ControllerSemillerista::class, 'listadoSemilleristasView'])->name('listadoSemilleristas');


    // RUTAS DE LA PROFE

    Route::get('/categorias', [Categorias::class, 'index'])->name('categorias');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');




    // Rutas Categorias

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

    Route::get('productos', [Productos::class, 'index'])->name('productos');

    Route::get('productos/detalle/{id}', [Productos::class, 'detalle'])->name('detalleProducto');;

    Route::get('productos/actualizar/{id}', [Productos::class, 'formularioAct'])->name('form_actualizaProducto');

    Route::post('productos/actualizar/{id}', [Productos::class, 'actualizar'])->name('actualizarProducto');

    Route::get('productos/eliminar/{id}', [Productos::class, 'eliminar'])->name('eliminarProducto');
});

Route::get('/registro/semillero', [SemilleroController::class, 'showForm'])->name('registro.semillero');
Route::post('/registro/semillero', [SemilleroController::class, 'register'])->name('registro.semillero');
Route::get('/listado/semilleros', [SemilleroController::class, 'listado'])->name('semilleros.listado');
Route::put('/editar/semillero/{id}', [SemilleroController::class, 'editar'])->name('editar_semillero');
Route::put('/actualizar/semillero/{id}', [SemilleroController::class, 'update'])->name('actualizar_semillero');
Route::delete('/eliminar/semillero/{id}', [SemilleroController::class, 'eliminar'])->name('eliminar_semillero');

Route::get('/registro/proyecto', [ProyectoController::class, 'showForm'])->name('registro.proyecto');
Route::post('/registro/proyecto', [ProyectoController::class, 'register'])->name('registro.proyecto');
Route::get('/listado/proyectos', [ProyectoController::class, 'listado'])->name('proyectos.listado');
Route::put('/editar/proyecto/{cod_proyecto}', [ProyectoController::class, 'editar'])->name('editar_proyecto');
Route::put('/actualizar/proyecto/{cod_proyecto}', [ProyectoController::class, 'update'])->name('actualizar_proyecto');
Route::delete('/eliminar/proyecto/{cod_proyecto}', [ProyectoController::class, 'eliminar'])->name('eliminar_proyecto');
Route::get('/presentar/proyecto', [PresentacionProyectoController::class,'create'])->name('presentar_proyecto');
Route::post('/guardar/proyecto', [PresentacionProyectoController::class, 'store'])->name('guardar_proyecto');
Route::get('/participantes/proyecto', [ParticipantesProyectoController::class, 'create'])->name('participantes_proyecto.create');
Route::post('/participantes/proyecto', [ParticipantesProyectoController::class, 'store'])->name('participantes_proyecto.store');


Route::get('/registro/evento', [EventoController::class, 'showForm'])->name('registro.evento');
Route::post('/registro/evento', [EventoController::class, 'register'])->name('registro.evento');
Route::get('/listado/eventos', [EventoController::class, 'listado'])->name('eventos.listado');
Route::put('/editar/evento/{cod_evento}', [EventoController::class, 'editar'])->name('editar_evento');
Route::put('/actualizar/evento/{cod_evento}', [EventoController::class, 'update'])->name('actualizar_evento');
Route::delete('/eliminar/evento/{cod_evento}', [EventoController::class, 'eliminar'])->name('eliminar_evento');
