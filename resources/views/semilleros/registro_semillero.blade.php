<x-guest-layout>
    <style>
         /* En tu hoja de estilos CSS */
         .three-columns-grid {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 50px;
                /* Espacio entre columnas */
            }
            .container-auth{
                padding:20px 50px 30px 50px;
                border-radius:10px;
                width:400px;
                margin:auto;
                margin-top:30px;
                background-color: rgb(31, 41, 55)
            }
            .nav-custom{
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                gap: 10px;
                width: 300px;
                margin: auto;
                margin-bottom: 30px;
                border: 1px solid rgb(31, 41, 55);
                border-radius: 5px;
                background-color: rgb(31, 41, 55);
            }
            .label-custom{
                color: white;
                margin-top: 10px
            }
            .title-auth{
                color: white;
                text-align: center;
                font-weight: bold;
                margin-bottom: 10px
            }
            .nav-link-custom{
                background-color: rgb(34, 197,94);
                width: 100%;
                text-align: center;
                color: white;
                border-radius: 5px;
                transition: background-color 0.3s ease-in-out;
            }
            .nav-link-off-custom{
                width: 100%;
                text-align: center;
                color: white;
                border-radius: 5px;
                transition: background-color 0.3s ease-in-out;
            }
    </style>

<x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('registro.semillero') }}" enctype="multipart/form-data">
            @csrf
            <div class="three-columns-grid">

                <div class="column">
                    <div>
                        <x-label for="cod_semillero" value="{{ __('Código Semillero') }}" />
                        <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="text" name="cod_semillero" :value="old('cod_semillero')" required autofocus />
                    </div>

                    <div>
                        <x-label for="nombre" value="{{ __('Nombre del Semillero') }}" />
                        <x-input id="nombre" class="block mt-1 w-full border border-green-500" type="text" name="nombre" :value="old('nombre')" required autofocus />
                    </div>

                    <div>
                        <x-label for="correo" value="{{ __('Correo Electrónico') }}" />
                        <x-input id="correo" class="block mt-1 w-full border border-green-500" type="email" name="correo" :value="old('correo')" required />
                    </div>

                    <div>
                        <x-label for="descripcion" value="{{ __('Descripción') }}" />
                        <x-input id="descripcion" class="block mt-1 w-full border border-green-500" type="text" name="descripcion" :value="old('descripcion')" required />
                    </div>

                    <div>
                        <x-label for="mision" value="{{ __('Misión') }}" />
                        <x-input id="mision" class="block mt-1 w-full border border-green-500" type="text" name="mision" :value="old('mision')" required />
                    </div>

                    <div>
                        <x-label for="vision" value="{{ __('Visión') }}" />
                        <x-input id="vision" class="block mt-1 w-full border border-green-500" type="text" name="vision" :value="old('vision')" required />
                    </div>

                    <div>
                        <x-label for="valores" value="{{ __('Valores') }}" />
                        <x-input id="valores" class="block mt-1 w-full border border-green-500" type="text" name="valores" :value="old('valores')" required />
                    </div>

                    <div>
                        <x-label for="objetivo" value="{{ __('Objetivo') }}" />
                        <x-input id="objetivo" class="block mt-1 w-full border border-green-500" type="text" name="objetivo" :value="old('objetivo')" required />
                    </div>

                </div>

                <div class="column">
                    <div>
                        <x-label for="lineas_investigacion" value="{{ __('Líneas de Investigación') }}" />
                        <x-input id="lineas_investigacion" class="block mt-1 w-full border border-green-500" type="text" name="lineas_investigacion" :value="old('lineas_investigacion')" required />
                    </div>

                    <div>
                        <x-label for="presentacion" value="{{ __('Presentación') }}" />
                        <x-input id="presentacion" class="block mt-1 w-full border border-green-500" type="text" name="presentacion" :value="old('presentacion')" required />
                    </div>

                    <div>
                        <x-label for="fecha_creacion" value="{{ __('Fecha de Creación') }}" />
                        <x-input id="fecha_creacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_creacion" :value="old('fecha_creacion')" required />
                    </div>

                    <div>
                        <x-label for="numero_resolucion" value="{{ __('Número de Resolución') }}" />
                        <x-input id="numero_resolucion" class="block mt-1 w-full border border-green-500" type="text" name="numero_resolucion" :value="old('numero_resolucion')" required />
                    </div>

                    <div>
                        <x-label for="logo" value="{{ __('Logo (PDF)') }}" />
                        <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="old('logo')" required accept="application/pdf" />
                    </div>

                    <div>
                        <x-label for="cod_coordinador" value="{{ __('Código de Coordinador Encargado') }}" />
                        <x-input id="cod_coordinador" class="block mt-1 w-full border border-green-500" type="text" name="cod_coordinador" :value="old('cod_coordinador')" required />
                    </div>
                </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
            <div class="mt-4">
                <x-label for="terms">
                    <div class="flex items-center">
                        <x-checkbox name="terms" id="terms" required />

                        <div class="ml-2">
                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                            'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                            'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-label>
            </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>