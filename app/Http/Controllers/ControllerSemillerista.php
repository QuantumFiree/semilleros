<?php

namespace App\Http\Controllers;

use App\Models\ProgramaModel;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SemilleristaModel;
use App\Models\Semillero;
use Faker\Core\Coordinates;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class ControllerSemillerista extends Controller
{
    public function registroView(){
        $programas = ProgramaModel::all();
        $semilleros = Semillero::all();
        return view('semilleristas.formRegistro', ['programas' => $programas, 'semilleros' => $semilleros]);
    }

    public function registro(Request $request){
        
        
        $cod_programa = DB::table('programa')->where('cod_programa_academico', $request->cod_programa_academico)->first();
        $cod_semillero = Semillero::where('cod_semillero', $request->cod_semillero)->first();
        $identificacion = SemilleristaModel::where('identificacion', $request->identificacion)->first();
        $cod_estudiantil = SemilleristaModel::where('cod_estudiantil', $request->cod_estudiantil)->first();
        $camposExistentes = ['identificacion'=>null, 'codEstudiantil'=>null, 'codPrograma' => null, 'codSemillero' => null, 'reporteMatricula' => null];

        if ($request->hasFile('reporte_matricula')) {
            $archivo = $request->file('reporte_matricula');
            $rutaArchivo = $archivo->store('reportes_matricula', 'public');
        } else {
            $camposExistentes['reporteMatricula'] = true;
        }

        if($identificacion){
            $camposExistentes['identificacion'] = true;
        }

        if($cod_estudiantil){
            $camposExistentes['codEstudiantil'] = true;
        }

        if(!$cod_programa){
            $camposExistentes['codPrograma'] = true;
        }

        if(!$cod_semillero){
            $camposExistentes['codSemillero'] = true;
        }

        if($identificacion || $cod_estudiantil || !$cod_programa || !$cod_semillero || $camposExistentes['reporteMatricula']){
            $semilleros = Semillero::all();
        $programas = ProgramaModel::all();
            return view('semilleristas.formRegistro', ['camposExistentes' => $camposExistentes, 'programas' => $programas, 'semilleros' => $semilleros]);
        }
        $user = User::find(auth()->user()->id);
        $user->estado = 'pendiente';
        $user->save();
        $respuesta = $request->all();
        $semillerista = new SemilleristaModel();
        $semillerista->cod_user = auth()->user()->id;
        $semillerista->nombres = $request->nombres;
        $semillerista->apellidos = $request->apellidos;
        $semillerista->identificacion = $request->identificacion;
        $semillerista->direccion = $request->direccion;
        $semillerista->telefono = $request->telefono;
        $semillerista->genero = $request->genero;
        $semillerista->fecha_nacimiento = $request->fecha_nacimiento;
        $semillerista->cod_programa_academico = $request->cod_programa_academico;
        $semillerista->cod_estudiantil = $request->cod_estudiantil;
        $semillerista->semestre = $request->semestre;
        $semillerista->fecha_vinculacion = $request->fecha_vinculacion;
        $semillerista->cod_semillero = $request->cod_semillero;
        $semillerista->reporte_matricula = $rutaArchivo;
        $semillerista->save();

         return redirect('dashboard');
    }

    public function datosPersonalesView(Request $request, $cod_semillerista){
        $semilleros = Semillero::all();
        $programas = ProgramaModel::all();
        $semillerista = SemilleristaModel::where('cod_user', '=', $cod_semillerista)->join('semillero', 'semillero.cod_semillero', '=', 'semillerista.cod_semillero')->join('programa', 'programa.cod_programa_academico', '=', 'semillerista.cod_programa_academico')->join('users', 'users.id', '=', 'cod_user')->select('cod_user', 'cod_semillerista', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'genero', 'fecha_nacimiento', 'cod_estudiantil', 'semestre', 'fecha_vinculacion', 'semillerista.cod_semillero', 'reporte_matricula', 'nombre', 'programa.cod_programa_academico', 'nombre_programa', 'estado')->first();
        
        return view('semilleristas.editarDatosPersonales', ['semillerista'=>$semillerista, 'semilleros' => $semilleros, 'programas' => $programas]);
    }

    public function datosPersonales(Request $request){
        
        $semillerista = SemilleristaModel::find($request->cod_semillerista); 

        if(auth()->user()->rol == 'admin'){
            if ($request->hasFile('reporte_matricula')) {
                $rutaAlmacenamientoArchivo = 'public/' . $request->url_reporte_actual;
                if(Storage::exists($rutaAlmacenamientoArchivo)){
                    if($request->url_reporte_actual){
                        Storage::disk('public')->delete($request->url_reporte_actual);
                    }
                    
                }
                $archivo = $request->file('reporte_matricula');
                $rutaArchivo = $archivo->store('reportes_matricula', 'public');
                $semillerista->update([
                    'cod_semillerista' => $request->cod_semillerista,
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'identificacion' => $request->identificacion,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'cod_programa_academico' => $request->cod_programa_academico,
                    'cod_estudiantil' => $request->cod_estudiantil,
                    'semestre' => $request->semestre,
                    'fecha_vinculacion' => $request->fecha_vinculacion,
                    'cod_semillero' => $request->cod_semillero,
                    'reporte_matricula' => $rutaArchivo,
                ]);
            } else {
                $semillerista->update([
    
                    'cod_semillerista' => $request->cod_semillerista,
                    'nombres' => $request->nombres,
                    'apellidos' => $request->apellidos,
                    'identificacion' => $request->identificacion,
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'genero' => $request->genero,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'cod_programa_academico' => $request->cod_programa_academico,
                    'cod_estudiantil' => $request->cod_estudiantil,
                    'semestre' => $request->semestre,
                    'fecha_vinculacion' => $request->fecha_vinculacion,
                    'cod_semillero' => $request->cod_semillero,
                ]);
            }
        }else{
            if($request->hasFile('reporte_matricula')){
                $rutaAlmacenamientoArchivo = 'public/' . $request->url_reporte_actual;
                if(Storage::exists($rutaAlmacenamientoArchivo)){
                    if($request->url_reporte_actual){
                        Storage::disk('public')->delete($request->url_reporte_actual);
                    }
                    
                }
                $archivo = $request->file('reporte_matricula');
                $rutaArchivo = $archivo->store('reportes_matricula', 'public');

                $semillerista->update([
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                    'reporte_matricula' => $rutaArchivo
                ]);
            }else{
                $semillerista->update([
                    'direccion' => $request->direccion,
                    'telefono' => $request->telefono,
                ]);
            }
            
        }

        if($request->estado){
            $user = User::where('users.id', '=', $request->cod_user)->first();
            $user->update([
                'estado' => 'activo'
            ]);
        }else if(auth()->user()->rol == 'admin'){
            $user = User::where('users.id', '=', $request->cod_user)->first();
            $user->update([
                'estado' => 'inactivo'
            ]);
        }

        $semilleros = Semillero::all();
        $programas = ProgramaModel::all();
        $semilleristas = SemilleristaModel::join('users', 'users.id', '=', 'semillerista.cod_user')->join('semillero', 'semillero.cod_semillero', '=', 'semillerista.cod_semillero')->join('programa', 'programa.cod_programa_academico', '=', 'semillerista.cod_programa_academico')->select('cod_semillerista', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'genero', 'fecha_nacimiento', 'cod_estudiantil', 'semestre', 'fecha_vinculacion', 'semillerista.cod_semillero', 'reporte_matricula', 'nombre', 'programa.cod_programa_academico', 'nombre_programa', 'estado', 'profile_photo_path', 'email', 'users.id')->get();

        

        if(auth()->user()->rol == 'semillerista'){
            return redirect()->route('profile.show');
        }else{
            return redirect()->route('listadoSemilleristas', ['semilleristas' => $semilleristas, 'semilleros' => $semilleros, 'programas' => $programas]);
        }
    }

    public function eliminarSemillerista(Request $request, $cod_semillerista){
        $semillerista = SemilleristaModel::find($cod_semillerista);
        $user = User::find($semillerista->cod_user);
        $semillerista->delete();
        $user->delete();

        $semilleros = Semillero::all();
        $programas = ProgramaModel::all();
        $semilleristas = SemilleristaModel::join('users', 'users.id', '=', 'semillerista.cod_user')->join('semillero', 'semillero.cod_semillero', '=', 'semillerista.cod_semillero')->join('programa', 'programa.cod_programa_academico', '=', 'semillerista.cod_programa_academico')->select('cod_semillerista', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'genero', 'fecha_nacimiento', 'cod_estudiantil', 'semestre', 'fecha_vinculacion', 'semillerista.cod_semillero', 'reporte_matricula', 'nombre', 'programa.cod_programa_academico', 'nombre_programa', 'estado', 'profile_photo_path', 'email', 'users.id')->get();

        return view('semilleristas.listado', ['semilleristas' => $semilleristas, 'semilleros' => $semilleros, 'programas' => $programas]);
    }

    public function listadoSemilleristasView(){

        $semilleros = Semillero::all();
        $programas = ProgramaModel::all();
        $semilleristas = SemilleristaModel::join('users', 'users.id', '=', 'semillerista.cod_user')->join('semillero', 'semillero.cod_semillero', '=', 'semillerista.cod_semillero')->join('programa', 'programa.cod_programa_academico', '=', 'semillerista.cod_programa_academico')->select('cod_semillerista', 'nombres', 'apellidos', 'identificacion', 'direccion', 'telefono', 'genero', 'fecha_nacimiento', 'cod_estudiantil', 'semestre', 'fecha_vinculacion', 'semillerista.cod_semillero', 'reporte_matricula', 'nombre', 'programa.cod_programa_academico', 'nombre_programa', 'estado', 'profile_photo_path', 'email', 'users.id')->get();

        return view('semilleristas.listado', ['semilleristas' => $semilleristas]);
    }

    public function pdf(){
        $semilleristas_pdfs = SemilleristaModel::all();
        $pdf = Pdf::loadView('semilleros.semilleristas_pdf', compact('semilleristas_pdfs'));
        return $pdf->stream();
    }
}
