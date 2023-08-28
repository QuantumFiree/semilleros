<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ParticipantesPresentacionProyecto;
use App\Models\PresentacionProyecto;
use App\Models\ParticipantesProyecto;
use App\Models\SemilleristaModel;
use App\Models\Semillero;
use Illuminate\Support\Facades\DB;

class ProyectoController extends Controller
{
    public function showForm()
        {
            $semilleros = Semillero::all();
            return view('semilleros.proyectos.registro_proyecto', ['semilleros' => $semilleros]);
        }

    public function register(Request $request)
        {
            $request->validate([
                'titulo' => 'required|string|max:255',
                'cod_semillero' => 'required|string',
                'tipo_proyecto' => 'required|in:Proyecto de investigacion,Proyecto de innovacion y desarrollo,Proyecto de emprendimiento',
                'estado' => 'required|in:Propuesta,En curso,Inactivo,Terminado',
                'fecha_inicio' => 'nullable|date',
                'fecha_finalizacion' => 'nullable|date',
                'propuesta' => 'file|max:2048',
                'proyecto_final' => 'nullable|file|max:2048',
            ]);

            if($request->hasFile('propuesta')){
                $proyecto = Proyecto::create([
                    'titulo' => $request->input('titulo'),
                    'cod_semillero' => $request->input('cod_semillero'),
                    'tipo_proyecto' => $request->input('tipo_proyecto'),
                    'estado' => $request->input('estado'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_finalizacion' => $request->input('fecha_finalizacion'),
                    'propuesta'=> $request->file('propuesta')->store('propuestas_proyectos', 'public'),
                ]);
            }else if($request->hasFile('propuesta') && $request->hasFile('proyecto_final')){
                $proyecto = Proyecto::create([
                    'titulo' => $request->input('titulo'),
                    'cod_semillero' => $request->input('cod_semillero'),
                    'tipo_proyecto' => $request->input('tipo_proyecto'),
                    'estado' => $request->input('estado'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_finalizacion' => $request->input('fecha_finalizacion'),
                    'propuesta'=> $request->file('propuesta')->store('propuestas_proyectos', 'public'),
                    'proyecto_final'=> $request->file('proyecto_final')->store('proyectos_finales', 'public'),
                ]);
            }else{
                $proyecto = Proyecto::create([
                    'titulo' => $request->input('titulo'),
                    'cod_semillero' => $request->input('cod_semillero'),
                    'tipo_proyecto' => $request->input('tipo_proyecto'),
                    'estado' => $request->input('estado'),
                    'fecha_inicio' => $request->input('fecha_inicio'),
                    'fecha_finalizacion' => $request->input('fecha_finalizacion')
                ]);
            }

            $proyecto->save();
            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido registrado exitosamente.');


        }

    public function listado()
        {
            $participantes = ParticipantesProyecto::join('semillerista', 'semillerista.cod_semillerista', '=', 'participantes_proyecto.cod_semillerista')
            ->join('users', 'users.id', '=', 'semillerista.cod_user')
            ->join('programa', 'programa.cod_programa_academico', '=', 'semillerista.cod_programa_academico')
            ->select('nombres', 'apellidos', 'semillerista.cod_semillerista', 'cod_proyecto', 'email', 'profile_photo_path', 'nombre_programa', 'identificacion', 'telefono', 'fecha_vinculacion', 'semestre')->get();
            $participantesArray = $participantes->toArray();
            $proyectos = DB::table('proyecto')
    ->select('proyecto.*', DB::raw('COALESCE(pp.num_participantes, 0) AS numero_participantes'))
    ->leftJoinSub(
        'SELECT cod_proyecto, COUNT(*) AS num_participantes FROM participantes_proyecto GROUP BY cod_proyecto',
        'pp',
        'proyecto.cod_proyecto',
        '=',
        'pp.cod_proyecto'
    )
    ->get();


            return view('semilleros.proyectos.proyectos_listado', ['proyectos' => $proyectos, 'participantes' => $participantesArray]);
        }

    public function editar($cod_proyecto)
        {
            $proyecto = Proyecto::find($cod_proyecto)
            ->join('semillero', 'semillero.cod_semillero', '=', 'proyecto.cod_semillero')
            ->first();
            $semilleros = Semillero::all();
            if (!$proyecto) {
                return redirect()->route('proyectos.listado')->with('error', 'El proyecto no existe.');
            }

            return view('semilleros.proyectos.proyectos_editar', ['proyecto' => $proyecto, 'semilleros' => $semilleros]);
        }

    public function update(Request $request, $cod_proyecto)
        {
            dd();
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
