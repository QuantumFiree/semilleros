<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ParticipantesPresentacionProyecto;
use App\Models\PresentacionProyecto;
use App\Models\ParticipantesProyecto;
use App\Models\SemilleristaModel;
use App\Models\Semillero;
use Illuminate\Validation\Rule;

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

            $semilleroExist = Semillero::where('cod_semillero', $request->input('cod_semillero'))->exists();

            if (!$semilleroExist) {
                return redirect()->route('registro.proyecto')->withErrors(['cod_semillero' => 'El código del semillero no está registrado en el sistema.'])->withInput();
            }

            $proyectoData = [
                'titulo' => $request->input('titulo'),
                'cod_semillero' => $request->input('cod_semillero'),
                'tipo_proyecto' => $request->input('tipo_proyecto'),
                'estado' => $request->input('estado'),
                'fecha_inicio' => $request->input('fecha_inicio'),
                'fecha_finalizacion' => $request->input('fecha_finalizacion'),
            ];

            if ($request->hasFile('propuesta')) {
                $proyectoData['propuesta'] = $request->file('propuesta')->store('archivos', 'public');
            }

            if ($request->hasFile('proyecto_final')) {
                $proyectoData['proyecto_final'] = $request->file('proyecto_final')->store('archivos', 'public');
            }

            $proyecto = Proyecto::create($proyectoData);
            $proyecto->save();

            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido registrado exitosamente.');
        }

        public function reporte()
        {
            $proyectos = Proyecto::all();
            
            return view('semilleros.proyectos.proyectos_listado_reporte', compact('proyectos'));
        }
        public function listado()

        {
            $proyectos = Proyecto::all();
            $participantes_presentacion_proyecto = ParticipantesPresentacionProyecto::all();

            $proyectosConParticipantes = [];

            foreach ($participantes_presentacion_proyecto as $participante_presentacion) {
                $proyecto_con_presentacion = Proyecto::find($participante_presentacion->presentacionProyecto->cod_proyecto);
                $semillerista = SemilleristaModel::find($participante_presentacion->cod_semillerista);

                if (!isset($proyectosConParticipantes[$proyecto_con_presentacion->cod_proyecto])) {
                    $proyectosConParticipantes[$proyecto_con_presentacion->cod_proyecto] = [
                        'proyecto' => $proyecto_con_presentacion,
                        'participantes' => [],
                    ];
                }

                $proyectosConParticipantes[$proyecto_con_presentacion->cod_proyecto]['participantes'][] = $semillerista;
            }
            return view('semilleros.proyectos.proyectos_listado', compact('proyectos', 'proyectosConParticipantes'));
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

            $semilleroExist = Semillero::where('cod_semillero', $request->input('cod_semillero'))->exists();

            if (!$semilleroExist) {
                return redirect()->route('editar_proyecto',['cod_proyecto' => $cod_proyecto])->withErrors(['cod_semillero' => 'El código del semillero no está registrado en el sistema.'])->withInput();
            }

            $proyecto->titulo = $request->input('titulo');
            $proyecto->cod_semillero = $request->input('cod_semillero');
            $proyecto->tipo_proyecto = $request->input('tipo_proyecto');
            $proyecto->estado = $request->input('estado');
            $proyecto->fecha_inicio = $request->input('fecha_inicio');
            $proyecto->fecha_finalizacion = $request->input('fecha_finalizacion');

            if ($request->hasFile('propuesta')) {
                $proyecto->propuesta = $request->file('propuesta')->store('archivos', 'public');
            }

            if ($request->hasFile('proyecto_final')) {
                $proyecto->proyecto_final = $request->file('proyecto_final')->store('archivos', 'public');
            }

            $proyecto->save();

            return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido actualizado exitosamente.');
    }

    public function eliminar($cod_proyecto)
        {
            try {
                $proyecto = Proyecto::find($cod_proyecto);

                if ($proyecto) {
                    ParticipantesProyecto::where('cod_proyecto', $cod_proyecto)->delete();
                    $proyecto->delete();
                    return redirect()->route('proyectos.listado')->with('success', 'El proyecto ha sido eliminado exitosamente.');
                } else {
                    return redirect()->route('proyectos.listado')->with('error', 'El proyecto no existe.');
                }
            } catch (\Illuminate\Database\QueryException $e) {
                return redirect()->route('proyectos.listado')->with('error', 'No se puede borrar este proyecto, hay tablas relacionadas a él.');
            }
        }
}
