<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParticipantesProyecto; 

class ParticipantesProyectoController extends Controller
{
    public function create()
    {
        return view('semilleros.proyectos.participantes_proyecto');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cod_proyecto' => 'required',
            'cod_semillerista' => 'required',
        ]);
        
        ParticipantesProyecto::create($validatedData);
        return redirect()->route('participantes_proyecto.create')->with('success', 'Participante registrado exitosamente.');
    }
}
