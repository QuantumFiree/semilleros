<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SemilleristaModel;

class ControllerSemillerista extends Controller
{
    public function registroView(){
        return view('semilleristas.formRegistro');
    }

    public function registro(Request $request){
        $user = User::find(auth()->user()->id);
        $user->estado = 'activo';
        $user->save();
        $respuesta = $request->all();
        $semillerista = new SemilleristaModel();
        $semillerista->cod_user = auth()->user()->id;
        $semillerista->nombres = $request->nombres;
        $semillerista->apellidos = $request->apellidos;
        $semillerista->identificacion = $request->identificacion;
        $semillerista->direccion = $request->direccion;
        $semillerista->telefono = $request->telefono;
        $semillerista->genero = $request->genero;
        $semillerista->fecha_nacimiento = $request->fecha_nacimiento;
        $semillerista->cod_programa_academico = $request->cod_programa_academico;
        $semillerista->cod_estudiantil = $request->cod_estudiantil;
        $semillerista->semestre = $request->semestre;
        $semillerista->fecha_vinculacion = $request->fecha_vinculacion;
        $semillerista->cod_semillero = $request->cod_semillero;
        $semillerista->reporte_matricula = $request->reporte_matricula;
        $semillerista->save();

        return redirect('dashboard');
    }
}
