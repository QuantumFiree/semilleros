<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
=======
use App\Http\Controllers\ControllerCoordinador;
>>>>>>> 74d5790369a8effd6862c7e3727397ffbee8e0d7

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
<<<<<<< HEAD
=======
Route::get('/registro', [ControllerCoordinador::class, 'registro'])->name('registroCoordinador');
>>>>>>> 74d5790369a8effd6862c7e3727397ffbee8e0d7

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
