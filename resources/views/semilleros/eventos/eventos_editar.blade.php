<x-app-layout>
    <style>
        /* Estilos generales */
        .form-field {
            margin-bottom: 20px;
        }

        .btn-register {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
            margin-right: 10px; 
        }

        .btn-register:last-child {
            margin-right: 0;
        }

        .btn-register:hover {
            background-color: #357ebd;
        }

        .form-field label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
            color: #666;
        }

        .form-field input[type="text"],
        .form-field textarea,
        .form-field select {
            height: 38px;
        }

        .form-container {
            margin: 20px auto;
            max-width: 800px;
            padding: 2px; 
            background: none; /* Cambia el color de fondo a un gris claro */
            border-color: #ccc; /* Cambia el color de fondo */
            border-radius: 8px;
        }


        .form-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            font-size: 14px;
            color: #444;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .date-field {
            display: flex;
            gap: 80px; 
            align-items: center; 
        }

        .date-field label {
            margin-bottom: 0;
        }

        .date-field input[type="date"] {
            width: 130%;
            padding: 10px; 
        }



    </style>


    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-900 text-center leading-tight">
                {{ __('Editar información del Evento') }}
            </h2>

            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <x-authentication-card>
        <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ route('actualizar_evento', $evento->cod_evento) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-container">
                <div class="column">
                    <div>
                        <label for="nombre">{{ __('Nombre del Evento:') }}</label>
                        <input id="nombre" type="text" name="nombre" :value="old('nombre')" required />
                    </div>

                    <div>
                        <label for="descripcion">{{ __('Descripción:') }}</label>
                        <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="form-field date-field">
                        <div>
                            <label for="fecha_inicio">{{ __('Fecha de Inicio:') }}</label>
                            <input id="fecha_inicio" type="date" name="fecha_inicio" :value="old('fecha_inicio')" />
                        </div>
                        <div>
                            <label for="fecha_fin">{{ __('Fecha de Fin:') }}</label>
                            <input id="fecha_fin" type="date" name="fecha_fin" :value="old('fecha_fin')" />
                        </div>
                    </div>
                
                    <div>
                        <label for="lugar">{{ __('Lugar:') }}</label>
                        <input id="lugar" type="text" name="lugar" :value="old('lugar')" />
                    </div>

                    <div>
                        <label for="tipo">{{ __('Tipo de Evento:') }}</label>
                        <select id="tipo" name="tipo" required>
                            <option value="Congreso">Congreso</option>
                            <option value="Encuentro">Encuentro</option>
                            <option value="Seminario">Seminario</option>
                        </select>
                    </div>

                    <div>
                        <label for="modalidad">{{ __('Modalidad:') }}</label>
                        <select id="modalidad" name="modalidad" required>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Hibrida">Hibrida</option>
                        </select>
                    </div>

                    <div>
                        <label for="clasificacion">{{ __('Clasificación:') }}</label>
                        <select id="clasificacion" name="clasificacion" required>                   
                            <option value="Local">Local</option>
                            <option value="Regional">Regional</option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
                    </div>
                
                    <div>
                        <label for="observaciones">{{ __('Observaciones:') }}</label>
                        <textarea id="observaciones" name="observaciones" rows="4">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="cod_semillero">{{ __('Código del semillero') }}</label>
                        <input id="cod_semillero" type="text" name="cod_semillero" :value="old('cod_semillero')" />
                    </div>
            </div>


            <div class="btn-container">
                <button type="submit" class="btn-register bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($evento) ? __('Actualizar') : __('Registrar') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>