<x-applayout>
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

        .columns {
        display: grid;
        gap: 20px;
        margin-top: 20px;
        }

        .columns select {
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #444;
            margin-bottom: 10px; 
        }

        .participant-container {
        position: relative;
        }

        .add-participant-btn {
            position: absolute;
            right: 0;
            top: 0;
            height: 100%;
            width: 40px;
            background-color: #f2f2f2;
            border: none;
            cursor: pointer;
        }

        .add-participant-btn {
        background-color: #007BFF; /* Cambia el color a azul */
        color: white; /* Color del icono */
        font-size: 20px;
        width: 40px;
        height: 40px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0; 
        margin-left: -25px; 
        border-radius: 0 4px 4px 0;
        position: relative; 
        right: auto; 
        margin-left: 0; 
        margin-top: 5px; 
       
    }

    .form-field input[type="text"],
    .form-field select,
    .form-field input[type="date"],
    .form-field input[type="file"] {
        border: 1px solid #ccc;
        border-radius: 6px; /* Ajusta el radio del borde */
        padding: 10px;
        width: 100%;
        font-size: 14px;
        color: #444;
        margin-bottom: 10px;
    }

    


    </style>

    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-800 text-right leading-tight">
                {{ __('Registro de Proyectos') }}
            </h2>
            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>

        <form method="POST" action="{{ route('registro.proyecto') }}" enctype="multipart/form-data">
            @csrf

            <div class="three-columns-grid">
                <div class="column">
                
                <div>
                    <x-label for="titulo" value="{{ __('Título del Proyecto') }}" />
                    <x-input id="titulo" class="block mt-1 w-full border border-green-500" type="text" name="titulo"  required autofocus />
                </div>

                <div>
                    <x-label for="cod_semillero" value="{{ __('Código del Semillero') }}" />
                    <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="number" name="cod_semillero" placeholder="#" required />
                    @if($errors->has('cod_semillero'))
                        <span class="text-danger">{{ $errors->first('cod_semillero') }}</span>
                    @endif
                </div>
                
                <x-label for="tipo" value="{{ __('Tipo de Proyecto') }}" />
                <div class="form-field">
                    <select id="tipo_proyecto" name="tipo_proyecto" required>
                        <option value="Proyecto de investigación">Proyecto de investigación</option>
                        <option value="Proyecto de innovación y desarrollo">Proyecto de innovación y desarrollo</option>
                        <option value="Proyecto de Emprendimiento">Proyecto de Emprendimiento</option>

                    </select>
                </div>

                <x-label for="estado" value="{{ __('Estado del Proyecto') }}" />
                <div class="form-field">
                    <select id="estado" name="estado" required>
                        <option value="Propuesta">Propuesta</option>
                        <option value="En Curso">En Curso</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Terminado">Terminado</option>
                    </select>
                </div>

                <div>
                    <x-label for="fecha_inicio" value="{{ __('Fecha de Inicio') }}" />
                    <x-input id="fecha_inicio" class="block mt-1 w-full border border-green-500" type="date" name="fecha_inicio"  />
                </div>

                <div>
                    <x-label for="fecha_finalizacion" value="{{ __('Fecha de Finalización') }}" />
                    <x-input id="fecha_finalizacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_finalizacion"  />
                </div>

                <div>
                    <x-label for="propuesta" value="{{ __('Propuesta') }}" />
                    <x-input id="propuesta" class="block mt-1 w-full border border-green-500" type="file" name="propuesta" />   
                </div>

                <div>
                    <x-label for="proyecto_final" value="{{ __('Proyecto Final') }}" />
                    <x-input id="proyecto_final" class="block mt-1 w-full border border-green-500" type="file" name="proyecto_final" />
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-register">
                    {{ __('Registrar') }}
                </button>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('participantes_proyecto.store') }}" class="btn-register">
                    {{ __('Agregar participantes a un proyecto') }}
                </a>
            </div>
        </form>

       
    </x-authentication-card>
</x-app-layout>
