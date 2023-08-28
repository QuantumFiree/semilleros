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
            background: none;
            /* Cambia el color de fondo a un gris claro */
            border-color: #ccc;
            /* Cambia el color de fondo */
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
        <div >
            <h2 class="font-semibold text-xl text-white text-left    leading-tight">
                {{ __('Editar información del Evento') }}
            </h2>
        </div>
    </x-slot>

    <div class=" flex flex-col w-full items-center " >
    <div class="w-[40%] mt-6 px-6 py-4 shadow-2xl overflow-hidden sm:rounded-lg" style="background-color: #bcd9c8">    
    <x-slot name="logo">
        </x-slot>
        <form method="POST" action="{{ route('actualizar_evento', $evento->cod_evento) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-container columns-2">
                <div class="column">
                    <div class="mr-10">
                        <div>
                            <label for="nombre">{{ __('Nombre del Evento:') }}</label>
                            <input id="nombre" type="text" name="nombre" value="{{$evento->nombre}}" required />
                        </div>

                        <div>
                            <label for="descripcion">{{ __('Descripción:') }}</label>
                            <textarea id="descripcion" name="descripcion" rows="4" required>{{$evento->descripcion}}</textarea>
                        </div>

                        <div >
                            <div class="mb-2 w-full">
                                <label for="fecha_inicio">{{ __('Fecha de Inicio:') }}</label>
                                <input id="fecha_inicio" class="w-full" type="date" name="fecha_inicio" value="{{$evento->fecha_inicio}}" />
                            </div>
                            <div>
                                <label for="fecha_fin">{{ __('Fecha de Fin:') }}</label>
                                <input id="fecha_fin" class="w-full" type="date" name="fecha_fin" value="{{$evento->fecha_fin}}" />
                            </div>
                        </div>

                        <div>
                            <label for="lugar">{{ __('Lugar:') }}</label>
                            <input id="lugar" type="text" name="lugar" value="{{$evento->lugar}}" />
                        </div>


                    </div>

                    <div class="h-20">

                    </div>
                    <div>
                            <label for="tipo">{{ __('Tipo de Evento:') }}</label>
                            <select id="tipo" name="tipo" required>
                                <option value="{{$evento->tipo}}">{{$evento->tipo}}</option>
                                <option value="Congreso">Congreso</option>
                                <option value="Encuentro">Encuentro</option>
                                <option value="Seminario">Seminario</option>
                            </select>
                        </div>
                    <div>
                        <label for="modalidad">{{ __('Modalidad:') }}</label>
                        <select id="modalidad" name="modalidad" required>
                            <option value="{{$evento->modalidad}}">{{$evento->modalidad}}</option>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Hibrida">Hibrida</option>
                        </select>
                    </div>

                    <div>
                        <label for="clasificacion">{{ __('Clasificación:') }}</label>
                        <select id="clasificacion" name="clasificacion" required>
                            <option value="{{$evento->clasificacion}}">{{$evento->clasificacion}}</option>
                            <option value="Local">Local</option>
                            <option value="Regional">Regional</option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
                    </div>

                    <div>
                        <label for="observaciones">{{ __('Observaciones:') }}</label>
                        <textarea id="observaciones" name="observaciones" rows="4">{{$evento->observaciones}}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="cod_semillero">{{ __('Selecciona un semillero') }}</label>
                        <select id="cod_semillero" class="block mt-1 w-full border border-green-500" name="cod_semillero">
                            @foreach ($semilleros as $semillero)
                                <option value="{{ $semillero->cod_semillero }}" @if ($semillero->cod_semillero == $evento->cod_semillero) selected @endif>{{ $semillero->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="btn-container flex justify-end">
                    <x-button type="submit" >
                        {{ isset($evento) ? __('Actualizar') : __('Registrar') }}
                    </x-button>
                </div>
            </div>
        </form>
    </div>
</div>

    
</x-app-layout>
