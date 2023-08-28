<?php

namespace App\Http\Controllers;

use App\Models\CoordinadorModel;
use App\Models\ProgramaModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;
use Laravel\Fortify\Actions\DisableTwoFactorAuthentication;

class ControllerCoordinador extends Controller
{

    public function registro(Request $request)
    {
        $cod_programa = DB::table('programa')->where('cod_programa_academico', $request->cod_programa_academico)->first();
        $identificacion = CoordinadorModel::where('identificacion', $request->identificacion)->first();
        $cod_docente = CoordinadorModel::where('cod_docente', $request->cod_docente)->first();
        $camposExistentes = ['identificacion' => null, 'codDocente' => null, 'codPrograma' => null, 'acuerdoNombramiento' => null];

        if ($request->hasFile('acuerdo_nombramiento')) {
            $archivo = $request->file('acuerdo_nombramiento');
            $rutaArchivo = $archivo->store('acuerdos_nombramiento', 'public');
        } else {
            $camposExistentes['acuerdoNombramiento'] = true;
        }

        if ($identificacion) {
            $camposExistentes['identificacion'] = true;
        }

        if ($cod_docente) {
            $camposExistentes['codDocente'] = true;
        }

        if (!$cod_programa) {
            $camposExistentes['codPrograma'] = true;
        }

        if ($identificacion || $cod_docente || !$cod_programa) {
            $programas = ProgramaModel::all();
            return view('coordinadores.formRegistro', ['camposExistentes' => $camposExistentes, 'programas' => $programas]);
        }

        $user = User::find(auth()->user()->id);
        $user->estado = 'pendiente';
        $user->save();
        $respuesta = $request->all();
        $coordinador = new CoordinadorModel();
        $coordinador->cod_user = auth()->user()->id;
        $coordinador->nombres = $request->nombres;
        $coordinador->apellidos = $request->apellidos;
        $coordinador->identificacion = $request->identificacion;
        $coordinador->direccion = $request->direccion;
        $coordinador->telefono = $request->telefono;
        $coordinador->genero = $request->genero;
        $coordinador->fecha_nacimiento = $request->fecha_nacimiento;
        $coordinador->cod_programa_academico = $request->cod_programa_academico;
        $coordinador->cod_docente = $request->cod_docente;
        $coordinador->area_conocimiento = $request->area_conocimiento;
        $coordinador->fecha_vinculacion = $request->fecha_vinculacion;
        $coordinador->acuerdo_nombramiento = $rutaArchivo;
        $coordinador->save();

        return redirect('dashboard');
    }

    public function registroView()
    {
        $programas = ProgramaModel::all();
        return view('coordinadores.formRegistro', ['codUser' => auth()->user()->id, 'programas' => $programas]);
    }

    public function datosPersonalesView($cod_coordinador)
    {
        $programas = ProgramaModel::all();
        $defaultNombres = 'Semillero no asignado';

        $coordinador = CoordinadorModel::where('cod_user', '=', $cod_coordinador)
            ->join('programa', 'programa.cod_programa_academico', '=', 'coordinador.cod_programa_academico')
            ->join('users', 'users.id', '=', 'coordinador.cod_user')
            ->leftJoin('semillero', 'semillero.cod_coordinador', '=', 'coordinador.cod_coordinador')
            ->selectRaw("
        coordinador.cod_coordinador,
        coordinador.cod_user,
        coordinador.cod_programa_academico,
        nombres,    
        apellidos,
        identificacion,
        direccion,
        telefono,
        genero,
        nombre_programa,
        fecha_nacimiento,
        cod_docente,
        area_conocimiento,
        fecha_vinculacion,
        acuerdo_nombramiento,
        COALESCE(nombre, ?) AS nombre,
        estado
    ", [$defaultNombres])
            ->first();
        return view('coordinadores.editarDatosPersonales', ['coordinador' => $coordinador, 'programas' => $programas]);
    }

    public function datosPersonales(Request $request)
    {
        $coordinador = CoordinadorModel::find($request->cod_coordinador);
        if (auth()->user()->rol == 'admin') {
            if ($request->hasFile('acuerdo_nombramiento')) {
                $rutaAlmacenamientoArchivo = 'public/' . $request->url_acuerdo_nombramiento_actual;
                if (Storage::exists($rutaAlmacenamientoArchivo)) {
                    if ($request->url_acuerdo_nombramiento_actual) {
                        Storage::disk('public')->delete($request->url_acuerdo_nombramiento_actual);
                    }
                }
                $archivo = $request->file('acuerdo_nombramiento');
                $rutaArchivo = $archivo->store('acuerdos_nombramiento', 'public');
                $coordinador->update([
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'identificacion' => $request->identificacion,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'cod_docente' => $request->cod_docente,
                    'area_conocimiento' => $request->area_conocimiento,
                    'fecha_vinculacion' => $request->fecha_vinculacion,
                    'cod_programa_academico' => $request->cod_programa_academico,
                    'acuerdo_nombramiento' => $rutaArchivo,
                ]);
            } else {
                $coordinador->update([

                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'identificacion' => $request->identificacion,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'cod_docente' => $request->cod_docente,
                    'area_conocimiento' => $request->area_conocimiento,
                    'fecha_vinculacion' => $request->fecha_vinculacion,
                    'cod_programa_academico' => $request->cod_programa_academico,
                ]);
            }
        } else {
            if ($request->hasFile('acuerdo_nombramiento')) {
                $rutaAlmacenamientoArchivo = 'public/' . $request->url_acuerdo_nombramiento_actual;
                if (Storage::exists($rutaAlmacenamientoArchivo)) {
                    if ($request->url_acuerdo_nombramiento_actual) {
                        Storage::disk('public')->delete($request->url_acuerdo_nombramiento_actual);
                    }
                }
                $archivo = $request->file('acuerdo_nombramiento');
                $rutaArchivo = $archivo->store('acuerdos_nombramiento', 'public');

                $coordinador->update([
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'area_conocimiento' => $request->area_conocimiento,
                    'acuerdo_nombramiento' => $rutaArchivo
                ]);
            } else {
                $coordinador->update([
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'area_conocimiento' => $request->area_conocimiento,
                ]);
            }
        }

        if ($request->estado) {
            $user = User::where('users.id', '=', $request->cod_user)->first();
            $user->update([
                'estado' => 'activo'
            ]);
        } else if (auth()->user()->rol == 'admin') {
            $user = User::where('users.id', '=', $request->cod_user)->first();
            $user->update([
                'estado' => 'inactivo'
            ]);
        }

        if(auth()->user()->rol == 'admin'){
            $defaultNombres = 'Semillero no asignado';
        $coordinadores = CoordinadorModel::join('users', 'users.id', '=', 'coordinador.cod_user')->leftJoin('semillero', 'semillero.cod_coordinador', '=', 'coordinador.cod_coordinador')->join('programa', 'programa.cod_programa_academico', '=', 'coordinador.cod_programa_academico')->selectRaw("
        coordinador.cod_coordinador,
        nombres,
        apellidos,
        identificacion,
        direccion,
        telefono,
        genero,
        fecha_nacimiento,
        coordinador.cod_programa_academico,
        cod_docente,
        area_conocimiento,
        fecha_vinculacion,
        acuerdo_nombramiento,
        users.id,
        profile_photo_path,
        estado,
        nombre_programa,
        COALESCE(nombre, ?) AS nombre,
        email
    ", [$defaultNombres])
            ->get();
            return redirect()->route('listadoCoordinadores', ['coordinadores' => $coordinadores]);
        }else{

            return redirect()->route('profile.show');
        }
    }

    public function eliminarCoordinador(Request $request, $cod_coordinador)
    {
        $coordinador = CoordinadorModel::find($cod_coordinador);
        $user = User::find($coordinador->cod_user);
        $coordinador->delete();
        $user->delete();

        $coordinadores = CoordinadorModel::join('users', 'users.id', '=', 'coordinador.cod_user')->join('semillero', 'semillero.cod_coordinador', '=', 'coordinador.cod_coordinador')->join('programa', 'programa.cod_programa_academico', '=', 'coordinador.cod_programa_academico')->select('coordinador.cod_coordinador', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'genero', 'fecha_nacimiento', 'coordinador.cod_programa_academico', 'cod_docente', 'area_conocimiento', 'fecha_vinculacion', 'acuerdo_nombramiento', 'users.id', 'profile_photo_path', 'estado', 'nombre_programa', 'nombre', 'email')->get();

        return view('semilleristas.listado', ['semilleristas' => $coordinadores]);
    }

    public function listadoCoordinadoresView(Request $request)
    {
        $defaultNombres = 'Semillero no asignado';
        $coordinadores = CoordinadorModel::join('users', 'users.id', '=', 'coordinador.cod_user')->leftJoin('semillero', 'semillero.cod_coordinador', '=', 'coordinador.cod_coordinador')->join('programa', 'programa.cod_programa_academico', '=', 'coordinador.cod_programa_academico')->selectRaw("
        coordinador.cod_coordinador,
        nombres,
        apellidos,
        identificacion,
        direccion,
        telefono,
        genero,
        fecha_nacimiento,
        coordinador.cod_programa_academico,
        cod_docente,
        area_conocimiento,
        fecha_vinculacion,
        acuerdo_nombramiento,
        users.id,
        profile_photo_path,
        estado,
        nombre_programa,
        COALESCE(nombre, ?) AS nombre,
        email
    ", [$defaultNombres])
            ->get();
        return view('coordinadores.listado', ['coordinadores' => $coordinadores]);
    }
}
