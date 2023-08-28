<?php
use App\Http\Controllers\InicioController;
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


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [InicioController::class, 'getInicio']);


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
    Route::get('/coordinador/editar_datos_personales/{cod_coordinador}', [ControllerCoordinador::class, 'datosPersonalesView'])->name('perfilCoordinadorView');
    Route::post('/coordinador/editar_datos_personales', [ControllerCoordinador::class, 'datosPersonales'])->name('perfilCoordinador');
    Route::get('/coordinador/eliminar/{cod_coordinador}', [ControllerCoordinador::class, 'eliminarCoordinador'])->name('eliminarCoordinador');

    Route::get('/coordinadores/listado', [ControllerCoordinador::class, 'listadoCoordinadoresView'])->name('listadoCoordinadores');

    // Rutas semillerista
    Route::get('/registro/semillerista', [ControllerSemillerista::class, 'registroView'])->name('registroSemillerista');
    Route::post('/registro/semillerista', [ControllerSemillerista::class, 'registro'])->name('registroSemillerista');
    Route::get('/perfil/semillerista/editar_datos_personales/{cod_semillerista}', [ControllerSemillerista::class, 'datosPersonalesView'])->name('perfilSemilleristaView');
    Route::post('/perfil/semillerista/editar_datos_personales', [ControllerSemillerista::class, 'datosPersonales'])->name('perfilSemillerista');
    Route::get('/semillerista/eliminar/{cod_semillerista}', [ControllerSemillerista::class, 'eliminarSemillerista'])->name('eliminarSemillerista');

    Route::get('/semilleristas/listado', [ControllerSemillerista::class, 'listadoSemilleristasView'])->name('listadoSemilleristas');


    // RUTAS DE LA PROFE

    Route::get('/categorias', [Categorias::class, 'index'])->name('categorias');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});

Route::get('/registro/semillero', [SemilleroController::class, 'showForm'])->name('registro.semillero');
Route::post('/registro/semillero', [SemilleroController::class, 'register'])->name('registro.semillero');
Route::get('/listado/semilleros', [SemilleroController::class, 'listado'])->name('semilleros.listado');
Route::get('/editar/semillero/{id}', [SemilleroController::class, 'editar'])->name('editar_semillero');
Route::put('/actualizar/semillero/{id}', [SemilleroController::class, 'update'])->name('actualizar_semillero');
Route::delete('/eliminar/semillero/{id}', [SemilleroController::class, 'eliminar'])->name('eliminar_semillero');

Route::get('/registro/proyecto', [ProyectoController::class, 'showForm'])->name('registro.proyecto');
Route::post('/registro/proyecto', [ProyectoController::class, 'register'])->name('registro.proyecto');
Route::get('/listado/proyectos', [ProyectoController::class, 'listado'])->name('proyectos.listado');
Route::get('/editar/proyecto/{cod_proyecto}', [ProyectoController::class, 'editar'])->name('editar_proyecto');
Route::put('/actualizar/proyecto/{cod_proyecto}', [ProyectoController::class, 'update'])->name('actualizar_proyecto');
Route::delete('/eliminar/proyecto/{cod_proyecto}', [ProyectoController::class, 'eliminar'])->name('eliminar_proyecto');
Route::get('/presentar/proyecto/{cod_proyecto}', [PresentacionProyectoController::class,'create'])->name('presentar_proyecto');
Route::post('/guardar/proyecto', [PresentacionProyectoController::class, 'store'])->name('guardar_proyecto');
Route::get('/participantes/proyecto', [ParticipantesProyectoController::class, 'create'])->name('participantes_proyecto.create');
Route::post('/participantes/proyecto', [ParticipantesProyectoController::class, 'store'])->name('participantes_proyecto.store');


Route::get('/registro/evento', [EventoController::class, 'showForm'])->name('registro.evento');
Route::post('/registro/evento', [EventoController::class, 'register'])->name('registro.evento');
Route::get('/listado/eventos', [EventoController::class, 'listado'])->name('eventos.listado');
Route::get('/listado/eventos/reporte', [EventoController::class, 'reporte'])->name('reporte.evento');
Route::get('/editar/evento/{cod_evento}', [EventoController::class, 'editar'])->name('editar_evento');
Route::put('/actualizar/evento/{cod_evento}', [EventoController::class, 'update'])->name('actualizar_evento');
Route::delete('/eliminar/evento/{cod_evento}', [EventoController::class, 'eliminar'])->name('eliminar_evento');

