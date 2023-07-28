<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function showForm()
        {
            return view('auth.registro_proyecto');
        }

    public function register(Request $request)
        {
            
            $proyecto = new Proyecto();
            $proyecto->cod_proyecto= $request->input('cod_proyecto');
            $proyecto->titulo = $request->input('titulo');
            $proyecto->cod_semillero = $request->input('cod_semillero');
            $proyecto->tipo_proyecto = $request->input('tipo_proyecto');
            $proyecto->estado = $request->input('estado');
            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_finalizacion = $request->input('fecha_finalizacion');
            $proyecto->propuesta = $request->input('propuesta');
            $proyecto->proyecto_final = $request->input('proyecto_final');
            $proyecto->save();
            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido registrado exitosamente.');
            
        }

    public function listado()
        {
            $proyectos = Proyecto::all();
            return view('auth.proyectos_listado', compact('proyectos'));
        }

    public function editar($cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto);

            if (!$proyecto) {
                return redirect()->route('proyectos.listado')->with('error', 'El proyecto no existe.');
            }

            return view('auth.proyectos_editar', compact('proyecto'));
        }

    public function update(Request $request, $cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto);
            $proyecto->cod_proyecto= $request->input('cod_proyecto');
            $proyecto->titulo = $request->input('titulo');
            $proyecto->cod_semillero = $request->input('cod_semillero');
            $proyecto->tipo_proyecto = $request->input('tipo_proyecto');
            $proyecto->estado = $request->input('estado');
            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_finalizacion = $request->input('fecha_finalizacion');
            $proyecto->propuesta = $request->input('propuesta');
            $proyecto->proyecto_final = $request->input('proyecto_final');
            $proyecto->save();
            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido actualizado exitosamente.');
            
        }

    public function eliminar($cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto);

            if ($proyecto) {
                $proyecto->delete();
                return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido eliminado exitosamente.');
            } else {
                return redirect()->route('proyectos.listado')->with('error', 'El proyecto no existe.');
            }
        }
}
