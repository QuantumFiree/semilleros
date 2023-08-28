<style>
    .three-columns-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 50px;
        /* Espacio entre columnas */
    }

    .container-form {
        width: 800px;
        margin: auto;
        margin-top: 30px;
    }

    .form-custom label {
        font-size: 15px;
        margin-bottom: 10px;
        margin-top: 20px;
    }
    /* Estilo para ocultar las flechas de incremento y decremento */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Proceso de registro') }}
            </h2>
            
        </div>
    </x-slot>

    <div class="container">
        <div class="container-form">
            <form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST" action="{{route('registroSemillerista')}}">
                @csrf
                <div class="three-columns-grid">
                    <div class="column">
                        <div style="display:none">
                            <x-input id="cod_user" type="text" name="cod_user" value="{{auth()->user()->id}}" required />
                        </div>
                        <div>
                            <x-label for="nombres" value="{{ __('Nombres') }}" />
                            <x-input id="nombres" class="block mt-1 w-full border border-green-500" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
                        </div>

                        <div>
                            <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                            <x-input id="apellidos" class="block mt-1 w-full border border-green-500" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                        </div>

                        @if(isset($camposExistentes) && $camposExistentes['identificacion'])
                        <div>
                            <x-label for="identificacion" value="{{ __('Identificación') }}" />
                            <x-input id="identificacion" class="block mt-1 w-full border border-green-500" type="number" name="identificacion" :value="old('identificacion')" required />
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                * La identificacion ingresada ya esta registrada.
                            </p>
                        </div>
                        @else
                        <div>
                            <x-label for="identificacion" value="{{ __('Identificación') }}" />
                            <x-input id="identificacion" class="block mt-1 w-full border border-green-500" type="number" name="identificacion" :value="old('identificacion')" required />
                        </div>
                        @endif



                        <div>
                            <x-label for="direccion" value="{{ __('Dirección') }}" />
                            <x-input id="direccion" class="block mt-1 w-full border border-green-500" type="text" name="direccion" :value="old('direccion')" required />
                        </div>

                        <div>
                            <x-label for="telefono" value="{{ __('Teléfono') }}" />
                            <x-input id="telefono" class="block mt-1 w-full border border-green-500" type="number" name="telefono" :value="old('telefono')" required />
                        </div>

                        <div class="sm:col-span-3">
                            <label for="genero" class="block text-sm font-medium leading-6 text-gray-900">Genero</label>
                            <div class="mt-2">
                                <select id="genero" name="genero" autocomplete="genero" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="Masculino" >Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div>
                            <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                            <x-input id="fecha_nacimiento" class="block mt-1 w-full border border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
                        </div>
                        <div style="margin-top:20px">
                            <x-label for="foto" value="{{ __('Foto (jpg, png, jpeg)') }}" />
                            <x-input id="foto" class="block mt-1 w-full" type="file" name="foto" :value="old('foto')" accept="image/*" />
                        </div>
                        <div class="sm:col-span-3">
                            <label for="programa" class="block text-sm font-medium leading-6 text-gray-900">Programa</label>
                            <div class="mt-2">
                                <select id="programa" name="cod_programa_academico" autocomplete="programa" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                @foreach($programas as $p)
                                <option value="{{$p->cod_programa_academico}}">{{$p->nombre_programa}}</option></option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        
                        
                        @if(isset($camposExistentes) && $camposExistentes['codEstudiantil'])
                        <div>
                            <x-label for="cod_estudiantil" value="{{ __('Codigo Estudiante') }}" />
                            <x-input id="cod_estudiantil" class="block mt-1 w-full border border-green-500" type="number" name="cod_estudiantil" :value="old('cod_estudiantil')" required />
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                * El codigo ingresado ya esta registrado.
                            </p>
                        </div>                       
                        @else
                        <div>
                            <x-label for="cod_estudiantil" value="{{ __('Codigo Estudiante') }}" />
                            <x-input id="cod_estudiantil" class="block mt-1 w-full border border-green-500" type="number" name="cod_estudiantil" :value="old('cod_estudiantil')" required />
                        </div>
                        @endif

                        <div>
                            <x-label for="semestre" value="{{ __('Semestre') }}" />
                            <x-input id="semestre" class="block mt-1 w-full border border-green-500" type="number" name="semestre" :value="old('semestre')" required />
                        </div>

                        <div>
                            <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                            <x-input id="fecha_vinculacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" />
                        </div>
                        <div class="sm:col-span-3">
                            <label for="cod_semillero" class="block text-sm font-medium leading-6 text-gray-900">Semillero</label>
                            <div class="mt-2">
                                <select id="cod_semillero" name="cod_semillero" autocomplete="cod_semillero" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                @foreach($semilleros as $s)
                                <option value="{{$s->cod_semillero}}">{{$s->nombre}}</option></option>
                                    @endforeach
                                    
                                </select>
                            </div>
                        </div>
                        @if(isset($camposExistentes) && $camposExistentes['codEstudiantil'])
                        <div style="margin-top:20px">
                            <x-label for="reporte_matricula" value="{{ __('Reporte de Matricula (PDF)') }}" />
                            <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" />
                            <p class="mt-2 peer-invalid:visible text-pink-600 text-sm">
                                * Error al cargar el archivo.
                            </p>
                        </div>                 
                        @else
                        <div style="margin-top:20px">
                            <x-label for="reporte_matricula" value="{{ __('Reporte de Matricula (PDF)') }}" />
                            <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" />
                        </div>
                        @endif
                        <div class="flex items-center justify-end mt-4">
                            <x-button id="buttonRegistro" class="ml-4">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

