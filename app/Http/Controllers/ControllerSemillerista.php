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
        $identificacion = SemilleristaModel::where('identificacion', $request->identificacion)->first();
        $cod_estudiantil = SemilleristaModel::where('cod_estudiantil', $request->cod_estudiantil)->first();
        $camposExistentes = ['identificacion'=>null, 'codEstudiantil'=>null];

        if($identificacion){
            $camposExistentes['identificacion'] = true;
        }

        if($cod_estudiantil){
            $camposExistentes['codEstudiantil'] = true;
        }

        if($identificacion || $cod_estudiantil){
            return view('semilleristas.formRegistro', ['camposExistentes' => $camposExistentes]);
        }
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

    public function datosPersonalesView(){
        $semillerista = SemilleristaModel::where('cod_user', '=', auth()->user()->id)->select('cod_semillerista', 'nombres', 'apellidos', 'direccion', 'telefono', 'fecha_nacimiento', 'cod_estudiantil', 'semestre', 'fecha_vinculacion', 'cod_semillero', 'reporte_matricula')->first();
        return view('semilleristas.editarDatosPersonales', ['semillerista'=>$semillerista]);
    }

    public function datosPersonales(Request $request){
        $semillerista = SemilleristaModel::find($request->cod_semillerista); 
        $semillerista->update([
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'genero' => $request->genero,
        ]);

        return redirect()->route('profile.show');
    }
}
