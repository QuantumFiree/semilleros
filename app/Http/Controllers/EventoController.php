<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Semillero;

class EventoController extends Controller
{
    public function showForm()
    {

        $semilleros = Semillero::all();
        return view('semilleros.eventos.registro_evento', ['semilleros' => $semilleros]);
    }


    public function register(Request $request)
    {
        $evento = new Evento();
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_inicio = $request->input('fecha_inicio');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->lugar = $request->input('lugar');
        $evento->tipo = $request->input('tipo');
        $evento->modalidad = $request->input('modalidad');
        $evento->clasificacion = $request->input('clasificacion');
        $evento->observaciones = $request->input('observaciones');
        $evento->cod_semillero = $request->input('cod_semillero');

        $evento->save();
        return redirect()->route('eventos.listado')->with('success', 'El evento ha sido registrado exitosamente.');
    }

    public function reporte()
    {
        $eventos = Evento::all();
        return view('semilleros.eventos.eventos_listado_reporte', compact('eventos'));
    }


    public function listado()
    {
        $eventos = Evento::all();
        return view('semilleros.eventos.eventos_listado', compact('eventos'));
    }

    public function editar($cod_evento)
    {
        $evento = Evento::find($cod_evento);
        $semilleros = Semillero::all();

        if (!$evento) {
            return redirect()->route('eventos.listado')->with('error', 'El evento no existe.');
        }

        return view('semilleros.eventos.eventos_editar', compact('evento', 'semilleros'));
    }

    public function update(Request $request, $cod_evento)
    {
        $evento = Evento::find($cod_evento);
        $evento->nombre = $request->input('nombre');
        $evento->descripcion = $request->input('descripcion');
        $evento->fecha_inicio = $request->input('fecha_inicio');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->lugar = $request->input('lugar');
        $evento->tipo = $request->input('tipo');
        $evento->modalidad = $request->input('modalidad');
        $evento->clasificacion = $request->input('clasificacion');
        $evento->observaciones = $request->input('observaciones');
        $evento->cod_semillero = $request->input('cod_semillero');

        $evento->save();
        return redirect()->route('eventos.listado')->with('success', 'El evento ha sido actualizado exitosamente.');
    }

    public function eliminar($cod_evento)
    {
        try{
            $evento = Evento::find($cod_evento);

            if ($evento) {
                $evento->delete();
                return redirect()->route('eventos.listado')->with('success', 'El evento ha sido eliminado exitosamente.');
            } else {
                return redirect()->route('eventos.listado')->with('error', 'El evento no existe.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('eventos.listado')->with('error', 'No se puede borrar este evento, hay tablas relacionadas a él.');
        }
    }
}
