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

        .form-field input[type="text"],
        .form-field input[type="date"],
        .form-field input[type="email"],
        .form-field input[type="file"],
        .form-field select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-field textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            margin-bottom: 5px;
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

        .date-field {
            display: flex;
            gap: 80px;
            align-items: center;
            margin-bottom: 10px;
        }

        .date-field label {
            margin-bottom: 0;
        }

        .date-field input[type="date"] {
            width: 130%;
            padding: 10px;
        }

        .form-container input[type="text"],
        .form-container textarea,
        .form-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            color: #444;
        }
    </style>



    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Registro de Eventos') }}
            </h2>
        </div>
    </x-slot>
    <div class=" flex flex-col w-full items-center pb-10 ">
        <div class=" w-[30%] mt-6 px-6 py-4 shadow-2xl overflow-hidden sm:rounded-lg" style="background-color: #bcd9c8">
            <x-slot name="logo">
            </x-slot>

            <form method="POST" action="{{ route('registro.evento') }}" enctype="multipart/form-data" class="">
                @csrf
                <div class="centered-form">

                    <div class="form-field">
                        <label for="nombre">{{ __('Nombre del Evento') }}</label>
                        <input id="nombre" type="text" name="nombre" :value="old('nombre')" required />
                    </div>

                    <div class="form-field">
                        <label for="descripcion">{{ __('Descripción') }}</label>
                        <textarea id="descripcion" name="descripcion" rows="4" required>{{ old('descripcion') }}</textarea>
                    </div>


                    <div class="form-field  felx flex-col">
                        <div>
                            <label for="fecha_inicio">{{ __('Fecha de Inicio:') }}</label>
                            <input id="fecha_inicio" type="date" name="fecha_inicio" :value="old('fecha_inicio')" />
                        </div>
                        <div>
                            <label for="fecha_fin">{{ __('Fecha de Fin:') }}</label>
                            <input id="fecha_fin" type="date" name="fecha_fin" :value="old('fecha_fin')" />
                        </div>
                    </div>


                    <div class="form-field">
                        <label for="lugar">{{ __('Lugar') }}</label>
                        <input id="lugar" type="text" name="lugar" :value="old('lugar')" />
                    </div>

                    <div class="form-field">
                        <label for="tipo">{{ __('Tipo de Evento') }}</label>
                        <select id="tipo" name="tipo" required>
                            <option value="Congreso">Congreso</option>
                            <option value="Encuentro">Encuentro</option>
                            <option value="Seminario">Seminario</option>
                        </select>
                    </div>


                    <div class="form-field">
                        <label for="modalidad">{{ __('Modalidad') }}</label>
                        <select id="modalidad" name="modalidad" required>
                            <option value="Presencial">Presencial</option>
                            <option value="Virtual">Virtual</option>
                            <option value="Hibrida">Hibrida</option>
                        </select>
                    </div>


                    <div class="form-field">
                        <label for="clasificacion">{{ __('Clasificación') }}</label>
                        <select id="clasificacion" name="clasificacion" required>
                            <option value="Local">Local</option>
                            <option value="Regional">Regional</option>
                            <option value="Nacional">Nacional</option>
                            <option value="Internacional">Internacional</option>
                        </select>
                    </div>


                    <div class="form-field">
                        <label for="observaciones">{{ __('Observaciones') }}</label>
                        <textarea id="observaciones" name="observaciones" rows="4">{{ old('observaciones') }}</textarea>
                    </div>

                    <div class="form-field">
                        <label for="cod_semillero">{{ __('Selecciona un semillero (opcional):') }}</label>
                        <select id="cod_semillero" class="block mt-1 w-full border border-green-500" name="cod_semillero">
                            <option value="">Selecciona un semillero</option>
                            @foreach ($semilleros as $semillero)
                            <option value="{{ $semillero->id }}">{{ $semillero->nombre }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="flex items-center justify-end mt-4">
                        <x-button type="submit">
                            {{ __('Registrar') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>