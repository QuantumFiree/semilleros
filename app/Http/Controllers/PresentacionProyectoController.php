<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento; 
use App\Models\PresentacionProyecto; 

class PresentacionProyectoController extends Controller
{
    public function create()
    {
        $eventos = Evento::all(); 
        return view('semilleros.proyectos.presentacion_proyecto', compact('eventos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'participacion' => 'required|string',
            'calificacion' => 'nullable|string',
            'certificacion' => 'required|file|max:2048',
            'evidencias' => 'required|file|max:2048',
            'cod_evento' => 'required|exists:evento,cod_evento', 
            'cod_proyecto' => 'required|integer', 
            'modalidad' => 'required|array', 
            'modalidad.*' => 'in:poster,ponencia', 
        ]);

    
        $presentacion = new PresentacionProyecto();
        $presentacion->participacion = $request->input('participacion');
        $presentacion->calificacion = $request->input('calificacion');
        $presentacion->certificacion = $request->input('certificacion');
        $presentacion->evidencias = $request->input('evidencias');
        $presentacion->cod_evento = $request->input('cod_evento');
        $presentacion->cod_proyecto = $request->input('cod_proyecto');
        $presentacion->modalidades = $request->input('modalidad');

        $presentacion->save();
        
        return redirect()->route('guardar_proyecto')->with('success', 'Presentación de proyecto creada exitosamente.');
    }

}
