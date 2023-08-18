<?php

use App\Models\Coordinador;
use App\Models\Semillerista;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{

    public function register(Request $request)
    {
        
        if ($request->input('rol') === 'coordinador') {
            $coordinador = Coordinador::create([
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'identificacion' => $request->input('identificacion'),
                'direccion'=> $request->input('direccion'),
                'telefono'=> $request->input('telefono'),
                'genero'=> $request->input('genero'),
                'fecha_nacimiento'=> $request->input('fecha_nacimiento'),
                'foto'=> $request->input('foto'),
                'cod_programa_academico'=> $request->input('cod_programa_academico'),
                'cod_docente'=> $request->input('cod_docente'),
                'area_conocimiento'=> $request->input('area_conocimiento'),
                'fecha_vinculacion'=> $request->input('fecha_vinculacion'),
                'acuerdo_nombramiento'=> $request->input('acuerdo_nombramiento'),
                'estado'=> $request->input('estado'),
            ]);

            $coordinador->cod_user = auth()->user()->id;
            $coordinador->save();
        } elseif ($request->input('rol') === 'semillerista') {
            $semillerista = Semillerista::create([
                'nombres' => $request->input('nombres'),
                'apellidos' => $request->input('apellidos'),
                'identificacion' => $request->input('identificacion'),
                'direccion'=> $request->input('direccion'),
                'telefono'=> $request->input('telefono'),
                'genero'=> $request->input('genero'),
                'fecha_nacimiento'=> $request->input('fecha_nacimiento'),
                'foto'=> $request->input('foto'),
                'cod_programa_academico'=> $request->input('cod_programa_academico'),
                'cod_docente'=> $request->input('cod_docente'),
                'area_conocimiento'=> $request->input('area_conocimiento'),
                'fecha_vinculacion'=> $request->input('fecha_vinculacion'),
                'acuerdo_nombramiento'=> $request->input('acuerdo_nombramiento'),
                'estado'=> $request->input('estado'),
            ]);

            $semillerista->cod_user = auth()->user()->id;
            $semillerista->save();
        }

        return redirect()->route('registro-exitoso', ['rol' => $request->input('rol')]);
    }

    public function registroExitoso(Request $request)
    {
        $rol = $request->input('rol');
        $mensaje = "¡Fue registrado exitosamente como $rol!";

        return view('registro_exitoso', compact('mensaje'));
    }
}

