<x-guest-layout>
    <style>
        /* Estilos CSS personalizados aquí */
        .form-field {
            margin-bottom: 20px;
        }

        .form-field label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .form-field input[type="text"],
        .form-field input[type="date"],
        .form-field input[type="email"],
        .form-field input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .form-field textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
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

    </style>

    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register.proyecto') }}" enctype="multipart/form-data">
            @csrf
            <div class="three-columns-grid">

                <div class="column">
    
                    <div class="form-field">
                        <label for="cod_proyecto">{{ __('Código de Proyecto') }}</label>
                        <input id="cod_proyecto" type="text" name="cod_proyecto" :value="old('cod_proyecto')" required autofocus />
                    </div>

                    <div class="form-field">
                        <label for="titulo">{{ __('Título del Proyecto') }}</label>
                        <input id="titulo" type="text" name="titulo" :value="old('titulo')" required />
                    </div>

                    <div class="form-field">
                        <label for="cod_semillero">{{ __('Código del Semillero') }}</label>
                        <input id="cod_semillero" type="text" name="cod_semillero" :value="old('cod_semillero')" required />
                    </div>

                    <div class="form-field">
                        <label for="tipo_proyecto">{{ __('Tipo de Proyecto') }}</label>
                        <input id="tipo_proyecto" type="text" name="tipo_proyecto" :value="old('tipo_proyecto')" />
                    </div>


                </div>

                <div class="column">
                   
                    <div class="form-field">
                        <label for="estado">{{ __('Estado del Proyecto') }}</label>
                        <input id="estado" type="text" name="estado" :value="old('estado')" required />
                    </div>

                    <div class="form-field">
                        <label for="fecha_inicio">{{ __('Fecha de Inicio') }}</label>
                        <input id="fecha_inicio" type="date" name="fecha_inicio" :value="old('fecha_inicio')" />
                    </div>

                    <div class="form-field">
                        <label for="fecha_finalizacion">{{ __('Fecha de Finalización') }}</label>
                        <input id="fecha_finalizacion" type="date" name="fecha_finalizacion" :value="old('fecha_finalizacion')" />
                    </div>

                    <div class="form-field">
                        <label for="propuesta">{{ __('Propuesta') }}</label>
                        <input id="propuesta" type="text" name="propuesta" :value="old('propuesta')" />
                    </div>

                </div>

                <div class="column">
                    
                </div>

            </div>

            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-register">
                    {{ __('Registrar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
