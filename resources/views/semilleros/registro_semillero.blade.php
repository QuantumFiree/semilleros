<x-app-layout>
    <style>
         .form-input {
            width: 100%;
            padding: 6px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 4px;
        }

        /* En tu hoja de estilos actual */
        .two-columns-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            /* Espacio entre columnas */
        }
        .container-auth {
            padding: 16px;
            border-radius: 8px;
            width: 550px;
            margin: auto;
            margin-top: 20px;
            background-color: rgb(31, 41, 55);
        }
        .nav-custom {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 8px;
            width: 100%;
            margin: auto;
            margin-bottom: 20px;
            border: 1px solid rgb(31, 41, 55);
            border-radius: 5px;
            background-color: rgb(31, 41, 55);
        }
        .label-custom {
            color: white;
            margin-top: 8px;
        }
        .center-title {
            text-align: center;
            background-color: #1f2937; 
            padding: 10px 0; 
        }
        .nav-link-custom {
            background-color: rgb(34, 197, 94);
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }
        .nav-link-off-custom {
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 4px;
            transition: background-color 0.3s ease-in-out;
        }
        .flex-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .flex-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
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
    </style>

    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-800 text-right leading-tight">
                {{ __('Registro de Semilleros') }}
            </h2>
            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <x-form_card>
        <x-slot name="logo" class="bg" >
        </x-slot>
        <form method="POST" action="{{ route('registro.semillero') }}" enctype="multipart/form-data">
            @csrf
            <div class="three-columns-grid">
                <div>
                    <x-label for="nombre" value="{{ __('Nombre del Semillero:') }}" />
                    <x-input id="nombre" class="form-input" type="text" name="nombre" :value="old('nombre')" required autofocus />
                </div>

                <div>
                    <x-label for="correo" value="{{ __('Correo Electrónico:') }}" />
                    <x-input id="correo" class="form-input" type="email" name="correo" :value="old('correo')" required />
                </div>

                <div>
                    <x-label for="descripcion" value="{{ __('Descripción:') }}" />
                    <x-input id="descripcion" class="form-input" type="text" name="descripcion" :value="old('descripcion')" required />
                </div>

                <div>
                    <x-label for="mision" value="{{ __('Misión:') }}" />
                    <x-input id="mision" class="form-input" type="text" name="mision" :value="old('mision')" required />
                </div>
                <div>
                    <x-label for="vision" value="{{ __('Visión:') }}" />
                    <x-input id="vision" class="form-input" type="text" name="vision" :value="old('vision')" required />
                </div>

                <div>
                    <x-label for="valores" value="{{ __('Valores:') }}" />
                    <x-input id="valores" class="form-input" type="text" name="valores" :value="old('valores')" required />
                </div>

                <div>
                    <x-label for="objetivo" value="{{ __('Objetivo:') }}" />
                    <x-input id="objetivo" class="form-input" type="text" name="objetivo" :value="old('objetivo')" required />
                </div>

                <div>
                    <x-label for="lineas_investigacion" value="{{ __('Líneas de Investigación:') }}" />
                    <x-input id="lineas_investigacion" class="form-input" type="text" name="lineas_investigacion" :value="old('lineas_investigacion')" required />
                </div>

                <div>
                    <x-label for="presentacion" value="{{ __('Presentación:') }}" />
                    <x-input id="presentacion" class="form-input" type="text" name="presentacion" :value="old('presentacion')" required />
                </div>

                <div>
                    <x-label for="fecha_creacion" value="{{ __('Fecha de Creación:') }}" />
                    <x-input id="fecha_creacion" class="form-input" type="date" name="fecha_creacion" :value="old('fecha_creacion')" required />
                </div>

                <div>
                    <x-label for="numero_resolucion" value="{{ __('Número de Resolución:') }}" />
                    <x-input id="numero_resolucion" class="form-input" type="number" name="numero_resolucion" :value="old('numero_resolucion')" placeholder="#" required />
                </div>

                <div>
                    <x-label for="logo" value="{{ __('Logo: ') }}" />
                    <x-input id="logo" class="form-input" type="file" name="logo" :value="old('logo')" required accept="image/*" />
                </div>

                <div>
                    <x-label for="cod_coordinador" value="{{ __('Coordinador Encargado:') }}" />
                    <select id="cod_coordinador" class="form-input" name="cod_coordinador" required>
                        <option value="">Selecciona un coordinador</option> 
                        @foreach ($coordinadores as $coordinador)
                            <option value="{{ $coordinador->cod_coordinador }}">{{ $coordinador->nombres }} {{ $coordinador->apellidos }}</option>

                        @endforeach
                    </select>
                    @error('cod_coordinador')
                        <p class="text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="archivo" value="{{ __('Archivo Presentación:') }}" />
                    <x-input id="archivo" class="form-input" type="file" name="archivo" :value="old('archivo')" required accept="file/*" />
                </div>

                <div>
                    <x-label for="archivo_resolucion" value="{{ __('Archivo Resolución:') }}" />
                    <x-input id="archivo_resolucion" class="form-input" type="file" name="archivo_resolucion" :value="old('archivo')" required accept="file/*" />
                </div>

            </div>
            <div class="flex items-center justify-end mt-4">
                <button type="submit" class="btn-register">
                    {{ __('Registrar') }}
                </button>
            </div>

        </form>
    </x-form_card>

</x-app-layout>
