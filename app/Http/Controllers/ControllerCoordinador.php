<?php

namespace App\Http\Controllers;

use App\Models\CoordinadorModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ControllerCoordinador extends Controller
{
    public function registro(Request $request){
        $user = User::find(auth()->user()->id);
        $user->estado = 'activo';
        $user->save();
        $respuesta = $request->all();
        $coordinador = new CoordinadorModel();
        $coordinador->cod_user = auth()->user()->id;
        $coordinador->nombres = $request->nombres;
        $coordinador->apellidos = $request->apellidos;
        $coordinador->identificacion = $request->identificacion;
        $coordinador->direccion = $request->direccion;
        $coordinador->telefono = $request->telefono;
        $coordinador->genero = $request->genero;
        $coordinador->fecha_nacimiento = $request->fecha_nacimiento;
        $coordinador->cod_programa_academico = $request->cod_programa_academico;
        $coordinador->cod_docente = $request->cod_docente;
        $coordinador->area_conocimiento = $request->area_conocimiento;
        $coordinador->fecha_vinculacion = $request->fecha_vinculacion;
        $coordinador->acuerdo_nombramiento = $request->acuerdo_nombramiento;
        $coordinador->save();

        return redirect('dashboard');
    }

    public function registroView(){
        return view('coordinadores.formRegistro', ['codUser' => auth()->user()->id]);
    }
}
