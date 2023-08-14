<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;

class ProyectoController extends Controller
{
    public function showForm()
        {
            return view('semilleros.proyectos.registro_proyecto');
        }

    public function register(Request $request)

        {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'cod_semillero' => 'required|string|max:255',
                'tipo_proyecto' => 'required|in:Proyecto de investigación,Proyecto de innovación y desarrollo,Proyecto de Emprendimiento',
                'estado' => 'required|in:Propuesta,En Curso,Inactivo,Terminado',
                'fecha_inicio' => 'nullable|date',
                'fecha_finalizacion' => 'nullable|date',
                'propuesta' => 'nullable|file|max:2048',
                'proyecto_final' => 'nullable|file|max:2048',
            ]);
        
            $proyecto = Proyecto::create([
                'titulo' => $request->input('titulo'),
                'cod_semillero' => $request->input('cod_semillero'),
                'tipo_proyecto' => $request->input('tipo_proyecto'),
                'estado' => $request->input('estado'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_finalizacion' => $request->input('fecha_finalizacion'),
                'propuesta'=> $request->file('propuesta')->store('archivos', 'public'),
                'proyecto_final'=> $request->file('proyecto_final')->store('archivos', 'public'),
            ]);
        
            $proyecto->save();
            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido registrado exitosamente.');

            
        }

    public function listado()
        {
            $proyectos = Proyecto::all();
            return view('semilleros.proyectos.proyectos_listado', compact('proyectos'));
        }

    public function editar($cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto);

            if (!$proyecto) {
                return redirect()->route('proyectos.listado')->with('error', 'El proyecto no existe.');
            }

            return view('semilleros.proyectos.proyectos_editar', compact('proyecto'));
        }

    public function update(Request $request, $cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto);
            $proyecto->titulo = $request->input('titulo');
            $proyecto->cod_semillero = $request->input('cod_semillero');
            $proyecto->tipo_proyecto = $request->input('tipo_proyecto');
            $proyecto->estado = $request->input('estado');
            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_finalizacion = $request->input('fecha_finalizacion');
            $proyecto->propuesta = $request->file('propuesta')->store('archivos', 'public');
            $proyecto->proyecto_final = $request->file('proyecto_final')->store('archivos', 'public');              
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
