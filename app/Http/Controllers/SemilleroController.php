<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semillero;

class SemilleroController extends Controller
{
    public function showForm()
    {
        return view('semilleros.registro_semillero');
    }

    public function register(Request $request)
    {
        $codSemillero = $request->input('cod_semillero');
        $existingSemillero = Semillero::where('cod_semillero', $codSemillero)->first();
        if ($existingSemillero) {
            return redirect()->route('registro.semillero')->with('error', 'El semillero ya está registrado.');
        }
        $semillero = Semillero::create([
            'cod_semillero' => $request->input('cod_semillero'),
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'descripcion' => $request->input('descripcion'),
            'mision'=> $request->input('mision'),
            'vision'=> $request->input('vision'),
            'valores'=> $request->input('valores'),
            'objetivo'=> $request->input('objetivo'),
            'lineas_investigacion'=> $request->input('lineas_investigacion'),
            'presentacion'=> $request->input('presentacion'),
            'fecha_creacion'=> $request->input('fecha_creacion'),
            'numero_resolucion'=> $request->input('numero_resolucion'),
            'logo'=> $request->input('logo'),
            'cod_coordinador'=> $request->input('cod_coordinador'),
        ]);

    
        return redirect()->route('semilleros.listado')->with('success', 'El semillero ha sido registrado exitosamente.');
    }

    public function listado()
    {
        $semilleros = Semillero::all();
        return view('semilleros.semilleros_listado', compact('semilleros'));
    }

    public function editar($id)
    {
        $semillero = Semillero::find($id);

        if (!$semillero) {
            return redirect()->route('semilleros.listado')->with('error', 'El semillero no existe.');
        }

        return view('semilleros.semilleros_editar', compact('semillero'));
    }

    public function update(Request $request, $id)
    
        {
            $semillero = Semillero::find($id);
                $semillero->nombre = $request ->input('nombre');
                $semillero->correo = $request->input('correo');
                $semillero->descripcion = $request->input('descripcion');
                $semillero->mision = $request->input('mision');
                $semillero->vision = $request->input('vision');
                $semillero->valores = $request->input('valores');
                $semillero->objetivo = $request->input('objetivo');
                $semillero->lineas_investigacion = $request->input('lineas_investigacion');
                $semillero->presentacion = $request->input('presentacion');
                $semillero->fecha_creacion = $request->input('fecha_creacion');
                $semillero->numero_resolucion = $request->input('numero_resolucion');
                $semillero->logo = $request->input('logo');
                $semillero->cod_coordinador = $request->input('cod_coordinador');
                $semillero->save();
                return redirect()->route('semilleros.listado');
            
        }
    public function eliminar($id)
        {
            $semillero = Semillero::find($id);
        
            if (!$semillero) {
                return redirect()->route('semilleros.listado')->with('error', 'El semillero no existe.');
            }
        
            $semillero->delete();
        
            return redirect()->route('semilleros.listado')->with('success', 'El semillero ha sido eliminado exitosamente.');
        }

}