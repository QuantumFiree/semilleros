
<x-app-layout>

<style>

        .form-field {
            margin-bottom: 10px;
        }

        .form-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #444;
            margin-bottom: 10px;
        }

        .btn-register {
            background-color: #34D399;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #2FAE85;
        }

            .columns-grid {
            display: grid;
            gap: 20px;
            margin-top: 20px;
        }



        .columns-grid select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #444;
            margin-bottom: 10px;
        }


    </style>


    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-900 text-right leading-tight">
                {{ __('Editar información del Proyecto') }}
            </h2>

            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ route('actualizar_proyecto', $proyecto->cod_proyecto) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="three-columns-grid">
                <div class="column">

                <div>
                    <x-label for="titulo" value="{{ __('Título del Proyecto') }}" />
                    <x-input id="titulo" class="block mt-1 w-full border border-green-500" type="text" name="titulo" value="{{$proyecto->titulo}}"  required autofocus />
                </div>

                <div>
                    <x-label for="cod_semillero" value="{{ __('Código del Semillero') }}" />
                    <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="number" name="cod_semillero" value="{{$proyecto->cod_semillero}}" placeholder="#" required />
                    @if($errors->has('cod_semillero'))
                        <span class="text-danger">{{ $errors->first('cod_semillero') }}</span>
                    @endif
                </div>
                
                <x-label for="tipo" value="{{ __('Tipo de Proyecto') }}" />
                <div class="form-field">
                    <select id="tipo_proyecto" name="tipo_proyecto" value="{{$proyecto->tipo_proyecto}}" required>
                        <option value="Proyecto de investigación">Proyecto de investigación</option>
                        <option value="Proyecto de innovación y desarrollo">Proyecto de innovación y desarrollo</option>
                        <option value="Proyecto de Emprendimiento">Proyecto de Emprendimiento</option>

                    </select>
                </div>

               
                <x-label for="estado" value="{{ __('Estado del Proyecto') }}" />
                <div class="form-field" >   
                    <select id="estado" name="estado" required>
                        <option value="{{$proyecto->estado}}">{{$proyecto->estado}}</option>
                        <option value="Propuesta">Propuesta</option>
                        <option value="En Curso">En Curso</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                </div>

                <div>
                    <x-label for="fecha_inicio" value="{{ __('Fecha de Inicio') }}" />
                    <x-input id="fecha_inicio" class="block mt-1 w-full border border-green-500" type="date" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}"/>
                </div>

                <div>
                    <x-label for="fecha_finalizacion" value="{{ __('Fecha de Finalización') }}" />
                    <x-input id="fecha_finalizacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_finalizacion" value="{{$proyecto->fecha_finalizacion}}"/>
                </div>

                <div>
                    <x-label for="propuesta" value="{{ __('Propuesta') }}" />
                    <x-input id="propuesta" class="block mt-1 w-full border border-green-500" type="file" name="propuesta" value="{{$proyecto->propuesta}}" />
                </div>

                <div>
                    <x-label for="proyecto_final" value="{{ __('Proyecto Final') }}" />
                    <x-input id="proyecto_final" class="block mt-1 w-full border border-green-500" type="file" name="proyecto_final" value="{{$proyecto->proyecto_final}}" />
                </div>

            </div>

            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="btn-register bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($proyecto) ? __('Actualizar') : __('Registrar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
