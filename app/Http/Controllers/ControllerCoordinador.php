<?php

namespace App\Http\Controllers;

use App\Models\CoordinadorModel;
use App\Models\ProgramaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;

class ControllerCoordinador extends Controller
{
    
    public function registro(Request $request){
        $cod_programa = CoordinadorModel::where('cod_programa_academico', $request->cod_programa_academico)->first();
        $identificacion = CoordinadorModel::where('identificacion', $request->identificacion)->first();
        $cod_docente = CoordinadorModel::where('cod_docente', $request->cod_docente)->first();
        $camposExistentes = ['identificacion'=>null, 'codDocente'=>null, 'codPrograma' => null];

        if($identificacion){
            $camposExistentes['identificacion'] = true;
        }

        if($cod_docente){
            $camposExistentes['codDocente'] = true;
        }

        if(!$cod_programa){
            $camposExistentes['codPrograma'] = true;
        }

        if($identificacion || $cod_docente || !$cod_programa){
            $programas = ProgramaModel::all();
            return view('coordinadores.formRegistro', ['camposExistentes' => $camposExistentes, 'programas'=>$programas]);
        }

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
        $programas = ProgramaModel::all();
        return view('coordinadores.formRegistro', ['codUser' => auth()->user()->id, 'programas' => $programas]);
    }

    public function datosPersonalesView(){
        $coordinador = CoordinadorModel::where('cod_user', '=', auth()->user()->id)->select('cod_coordinador', 'nombres', 'apellidos', 'direccion', 'telefono', 'fecha_nacimiento', 'cod_docente', 'area_conocimiento', 'fecha_vinculacion', 'acuerdo_nombramiento')->first();
        return view('coordinadores.editarDatosPersonales', ['coordinador' => $coordinador]);
    }

    public function datosPersonales(Request $request){
        $coordinador = CoordinadorModel::find($request->cod_coordinador); 
        $coordinador->update([
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'genero' => $request->genero,
            'area_conocimiento' => $request->area_conocimiento,
        ]);

        return redirect()->route('profile.show');
    }
}
