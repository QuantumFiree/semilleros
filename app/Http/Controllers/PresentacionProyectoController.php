<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\PresentacionProyecto;
use App\Models\ParticipantesProyecto;
use App\Models\SemilleristaModel;
use App\Models\ParticipantesPresentacionProyecto;
use App\Models\Proyecto;

class PresentacionProyectoController extends Controller
{
    public function create(Request $request, $cod_proyecto)
    {
        $eventos = Evento::all();
        $proyecto = Proyecto::find($cod_proyecto);
        $participantes_proyecto = ParticipantesProyecto::where('cod_proyecto', $cod_proyecto)->get();
        $participantes = [];

        foreach ($participantes_proyecto as $participante_proyecto) {
            $participante = SemilleristaModel::find($participante_proyecto->cod_semillerista);
            if ($participante) {
                $participantes[] = $participante;
            }
        }

        return view('semilleros.proyectos.presentacion_proyecto', compact('eventos', 'participantes', 'proyecto'));
    }

    public function listado()
    {
        $presentaciones = PresentacionProyecto::all();
        return view('semilleros.proyectos.presentaciones_listado', compact('presentaciones'));
    }

    public function eliminar($cod_presentacion_proyecto)
    {
        $presentacion = PresentacionProyecto::find($cod_presentacion_proyecto);

        if ($presentacion) {
            ParticipantesPresentacionProyecto::where('cod_presentacion_proyecto', $cod_presentacion_proyecto)->delete();
            $presentacion->delete();
            return redirect()->route('presentaciones.listado')->with('success', 'La presentacion ha sido eliminado exitosamente.');
        } else {
            return redirect()->route('presentaciones.listado')->with('error', 'La presentacion no existe.');
        }
    }

    public function store(Request $request, $cod_proyecto)
    {
        $request->validate([
            'participacion' => 'required|string',
            'calificacion' => 'nullable|string',
            'certificacion' => 'required|file|max:2048',
            'evidencias' => 'required|file|max:2048',
            'cod_evento' => 'required|exists:evento,cod_evento',
            // 'modalidad' => 'required|array',
            // 'modalidad.*' => 'in:poster,ponencia',
        ]);


        $presentacion = new PresentacionProyecto();
        $presentacion->participacion = $request->input('participacion');
        $presentacion->calificacion = $request->input('calificacion');
        $presentacion->certificacion = $request->input('certificacion');
        $presentacion->evidencias = $request->input('evidencias');
        $presentacion->cod_evento = $request->input('cod_evento');
        $presentacion->cod_proyecto = $cod_proyecto;
        // $presentacion->modalidades = $request->input('modalidad');
        // TODO El campo de modalidad no existe en la base de datos, se debe agregar en la migracion y en el modelo

        $presentacion->save();

        $cod_presentacion_proyecto = $presentacion->cod_presentacion_proyecto;

        foreach ($request->input('participantes', []) as $participante) {
            ParticipantesPresentacionProyecto::create([
                'cod_presentacion_proyecto' => $cod_presentacion_proyecto,
                'cod_semillerista' => $participante,
            ]);
        }

        return redirect()->route('proyectos.listado')->with('success', 'Presentación de proyecto creada exitosamente.');
    }

}
