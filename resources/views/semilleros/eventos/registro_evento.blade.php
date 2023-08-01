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

        <form method="POST" action="{{ route('registro.evento') }}" enctype="multipart/form-data">
            @csrf
            <div class="three-columns-grid">

                <div class="column">
                    <!-- Campos específicos para eventos -->
                    <div class="form-field">
                        <label for="cod_evento">{{ __('Código de Evento') }}</label>
                        <input id="cod_evento" type="text" name="cod_evento" :value="old('cod_evento')" required autofocus />
                    </div>

                    <div class="form-field">
                        <label for="nombre">{{ __('Nombre del Evento') }}</label>
                        <input id="nombre" type="text" name="nombre" :value="old('nombre')" required />
                    </div>

                    <div class="form-field">
                        <label for="descripcion">{{ __('Descripción') }}</label>
                        <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="fecha_inicio">{{ __('Fecha de Inicio') }}</label>
                        <input id="fecha_inicio" type="date" name="fecha_inicio" :value="old('fecha_inicio')" />
                    </div>

                    <div class="form-field">
                        <label for="fecha_fin">{{ __('Fecha de Fin') }}</label>
                        <input id="fecha_fin" type="date" name="fecha_fin" :value="old('fecha_fin')" />
                    </div>

                </div>
                <div class="column">
                    
                    <div class="form-field">
                        <label for="lugar">{{ __('Lugar') }}</label>
                        <input id="lugar" type="text" name="lugar" :value="old('lugar')" />
                    </div>

                    <div class="form-field">
                        <label for="tipo">{{ __('Tipo de Evento') }}</label>
                        <input id="tipo" type="text" name="tipo" :value="old('tipo')" />
                    </div>

                    <div class="form-field">
                        <label for="modalidad">{{ __('Modalidad') }}</label>
                        <input id="modalidad" type="text" name="modalidad" :value="old('modalidad')" />
                    </div>

                    <div class="form-field">
                        <label for="clasificacion">{{ __('Clasificación') }}</label>
                        <input id="clasificacion" type="text" name="clasificacion" :value="old('clasificacion')" />
                    </div>

                </div>


                <div class="column">
        
                    <div class="form-field">
                        <label for="observaciones">{{ __('Observaciones') }}</label>
                        <textarea id="observaciones" name="observaciones" rows="4">{{ old('observaciones') }}</textarea>
                    </div>
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
