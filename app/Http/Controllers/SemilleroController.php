<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semillero;
use App\Models\CoordinadorModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;

class SemilleroController extends Controller
{
    public function showForm()
    {
        return view('semilleros.registro_semillero');
    }

    public function register(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'correo' => 'required|email',
        'descripcion' => 'required',
        'mision' => 'required',
        'vision' => 'required',
        'valores' => 'required',
        'objetivo' => 'required',
        'lineas_investigacion' => 'required',
        'presentacion' => 'required',
        'fecha_creacion' => 'required|date',
        'numero_resolucion' => 'required',
        'logo' => 'required|image|max:2048',
        'cod_coordinador' => 'required',
        'archivo' => 'required|file|max:2048',
        'archivo_resolucion' => 'required|file|max:2048',
    ]);

    $coordinadorExists = CoordinadorModel::where('cod_coordinador', $request->input('cod_coordinador'))->exists();

    if (!$coordinadorExists) {
        return redirect()->route('registro.semillero')->withErrors(['cod_coordinador' => 'El código de coordinador no está registrado en el sistema.'])->withInput();
    }

    try {
        Semillero::create([
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'descripcion' => $request->input('descripcion'),
            'mision' => $request->input('mision'),
            'vision' => $request->input('vision'),
            'valores' => $request->input('valores'),
            'objetivo' => $request->input('objetivo'),
            'lineas_investigacion' => $request->input('lineas_investigacion'),
            'presentacion' => $request->input('presentacion'),
            'fecha_creacion' => $request->input('fecha_creacion'),
            'numero_resolucion' => $request->input('numero_resolucion'),
            'logo' => $request->file('logo')->store('logos', 'public'),
            'cod_coordinador' => $request->input('cod_coordinador'),
            'archivo' =>$request->input('archivo'),
            'archivo_resolucion' =>$request->input('archivo_resolucion'),
        ]);
    } catch (\Exception $e) {
        return redirect()->route('registro.semillero')->withErrors(['error' => 'Hubo un error al registrar el semillero.'])->withInput();
    }

    return redirect()->route('semilleros.listado')->with('success', 'El semillero ha sido registrado exitosamente.');
}

    public function listado()
    {
        $semilleros = Semillero::all();

        foreach ($semilleros as $semillero) {
            $semillero->logo_url = Storage::url('public/logos/' . $semillero->logo);
        }
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
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email',
            'descripcion' => 'required',
            'mision' => 'required',
            'vision' => 'required',
            'valores' => 'required',
            'objetivo' => 'required',
            'lineas_investigacion' => 'required',
            'presentacion' => 'required',
            'fecha_creacion' => 'required|date',
            'numero_resolucion' => 'required',
            'logo' => 'required|image|max:2048',
            'cod_coordinador' => 'required|exists:coordinador,cod_coordinador',
            'archivo' => 'required|file|max:2048',
            'archivo_resolucion' => 'required|file|max:2048',
        ]);

        try {
            $semillero = Semillero::find($id);

            if (!$semillero) {
                return redirect()->route('semilleros.listado')->with('error', 'El semillero no existe.');
            }

            $semillero->nombre = $request->input('nombre');
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
            $semillero->logo = $request->file('logo')->store('logos', 'public');
            $semillero->cod_coordinador = $request->input('cod_coordinador');
            $semillero->archivo =$request->input('archivo');
            $semillero->archivo_resolucion =$request->input('archivo_resolucion');
            $semillero->save();

            return redirect()->route('semilleros.listado')->with('success', 'El semillero ha sido actualizado exitosamente.');
        } catch (\Exception $e) {
            return redirect()->route('editar_semillero', ['id' => $id])->withErrors(['error' => 'Hubo un error al actualizar el semillero.'])->withInput();
        }
    }



    public function eliminar($id)
    {
        try {
            $semillero = Semillero::find($id);

            if ($semillero) {
                $semillero->delete();
                return redirect()->route('semilleros.listado')->with('success', 'El evento ha sido eliminado exitosamente.');
            } else {
                return redirect()->route('semilleros.listado')->with('error', 'El evento no existe.');
            }
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('semilleros.listado')->with('error', 'No se puede borrar este semillero, hay tablas relacionadas a él.');
        }
    }



}
