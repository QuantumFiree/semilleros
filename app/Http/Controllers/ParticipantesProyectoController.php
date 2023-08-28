<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParticipantesProyecto;
use App\Models\SemilleristaModel;

class ParticipantesProyectoController extends Controller
{
        public function create($cod_proyecto)
        {
            $participantes_actuales = ParticipantesProyecto::where('cod_proyecto', '=', $cod_proyecto)
            ->join('semillerista', 'semillerista.cod_semillerista', '=', 'participantes_proyecto.cod_semillerista')
            ->orderBy('nombres', 'asc')
            ->get();
            $codSemillero = '777';
            $semilleristas = SemilleristaModel::where('cod_semillero', '=', $codSemillero)
            ->orderBy('nombres', 'asc')
            ->get();

            return view('semilleros.proyectos.participantes_proyecto', ['semilleristas' => $semilleristas, 'participantes_actuales' => $participantes_actuales, 'cod_proyecto' => $cod_proyecto]);
        }

    public function store(Request $request)
    {
        if($request->cod_semilleristas){
            ParticipantesProyecto::where('cod_proyecto', '=', $request->cod_proyecto)->delete();
            foreach($request->cod_semilleristas as $cod_semillerista){
                $participante = new ParticipantesProyecto();
                $participante->cod_proyecto = $request->cod_proyecto;
                $participante->cod_semillerista = $cod_semillerista;
                $participante->save();
            }
            return redirect()->route('proyectos.listado')->with('success', 'Participante registrado exitosamente.');
        }
        else{
            return redirect()->route('proyectos.listado ')->with('success', 'Participante registrado exitosamente.');
        }

        ParticipantesProyecto::create($validatedData);

    }
}
