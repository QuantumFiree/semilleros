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
        <nav id="navRegistro" class="nav nav-custom">
            <a id="linkOneActive" class="nav-link-custom nav-link active" aria-current="page" href="{{ route('register') }}">Coordinador</a>
            <a id="linkTwoActive" class="nav-link nav-link-off-custom" href="{{ route('register') }}">Semillerista</a>
        </nav>
        

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="three-columns-grid">

                <div class="column">
                    <div>
                        <x-label for="nombres" value="{{ __('Nombres') }}"/>
                        <x-input id="nombres" class="block mt-1 w-full border border-green-500" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
                    </div>

                    <div>
                        <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                        <x-input id="apellidos" class="block mt-1 w-full border border-green-500" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                    </div>

                    <div>
                        <x-label for="identificacion" value="{{ __('Identificación') }}" />
                        <x-input id="identificacion" class="block mt-1 w-full border border-green-500" type="text" name="identificacion" :value="old('identificacion')" required />
                    </div>

                    <div>
                        <x-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-input id="direccion" class="block mt-1 w-full border border-green-500" type="text" name="direccion" :value="old('direccion')" required />
                    </div>

                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="telefono" class="block mt-1 w-full border border-green-500" type="text" name="telefono" :value="old('telefono')" required />
                    </div>

                    <div>
                        <x-label for="genero" value="{{ __('Genero') }}" />
                        <x-input id="genero" class="block mt-1 w-full border border-green-500" type="text" name="genero" :value="old('genero')" required />
                    </div>
                </div>
                <div class="column">
                    <div>
                        <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-input id="fecha_nacimiento" class="block mt-1 w-full border border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
                    </div>
                    <div>
                        <x-label for="codigo_programa_academico" value="{{ __('Código Programa Académico') }}" />
                        <x-input id="codigo_programa_academico" class="block mt-1 w-full border border-green-500" type="text" name="codigo_programa_academico" :value="old('codigo_programa_academico')" required />
                    </div>
                    <div id="inputs_coordinador">
                        <div>
                            <x-label for="cod_docente" value="{{ __('Código Docente') }}" />
                            <x-input id="cod_docente" class="block mt-1 w-full border border-green-500" type="text" name="cod_docente" :value="old('cod_docente')" required />
                        </div>

                        <div>
                            <x-label for="area_conocimiento" value="{{ __('Área de Conocimiento') }}" />
                            <x-input id="area_conocimiento" class="block mt-1 w-full border border-green-500" type="text" name="area_conocimiento" :value="old('area_conocimiento')" required />
                        </div>

                        <div>
                            <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                            <x-input id="fecha_vinculacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" required />
                        </div>

                        <div style="margin-top:20px">
                            <x-label for="acuerdo_nombramiento" value="{{ __('Acuerdo de Nombramiento (PDF)') }}" />
                            <x-input id="acuerdo_nombramiento" class="block mt-1 w-full" type="file" name="acuerdo_nombramiento" :value="old('acuerdo_nombramiento')" required accept="application/pdf" />
                        </div>
                    </div>
                    <div id="inputs_semillerista" style="display:none">
                        <div>
                            <x-label for="cod_estudiante" value="{{ __('Codigo Estudiantil') }}" />
                            <x-input id="cod_estudiante" class="block mt-1 w-full border border-green-500" type="text" name="cod_estudiante" :value="old('cod_estudiante')" required />
                        </div>

                        <div>
                            <x-label for="semestre" value="{{ __('Semestre actual') }}" />
                            <x-input id="semestre" class="block mt-1 w-full border border-green-500" type="text" name="semestre" :value="old('semestre')" required />
                        </div>

                        <div>
                            <x-label for="cod_semillero" value="{{ __('Codigo semillero') }}" />
                            <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="text" name="cod_semillero" :value="old('cod_semillero')" required />
                        </div>

                        <div>
                            <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                            <x-input id="fecha_vinculacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" required />
                        </div>

                        <div style="margin-top:20px">
                            <x-label for="reporte_matricula" value="{{ __('Reporte matricula (PDF)') }}" />
                            <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" required accept="application/pdf" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-auth">
                <h4 class="title-auth">Usuario</h4>
                <div>
                    <x-label class="label-custom" for="email" value="{{ __('Correo Electronico') }}" />
                    <x-input id="email" class="block mt-1 w-full border border-green-500 border-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>

                <div>
                    <x-label class="label-custom" for="password" value="{{ __('Contraseña') }}" />
                    <x-input id="password" class="block mt-1 w-full border border-green-500 border-2" type="password" name="password" required autocomplete="new-password" />
                </div>

                <div>
                    <x-label class="label-custom" for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border border-green-500 border-2" type="password" name="password_confirmation" required autocomplete="new-password" />
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
        </form>
        <h2 class="title-cuenta">¿Deseas continuar como?</h2>
        <nav id="navRegistro" class="nav nav-custom">
            <a id="linkOneActive" class="nav-link-custom nav-link active" aria-current="page" href="{{ route('register') }}">Coordinador</a>
            <a id="linkTwoActive" class="nav-link nav-link-off-custom" href="{{ route('register') }}">Semillerista</a>
        </nav>
        <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya te encuentras registrado?') }}
                </a>

                <x-button id="buttonFormUser" class="ml-4">
                            {{ __('Registrar') }}
                </x-button>
            </div>
    </x-authentication-card>
</x-guest-layout>
<script>
    // Obtén la etiqueta <nav> por su ID
    const coordinadores = document.getElementById('linkOneActive');
    const semilleristas = document.getElementById('linkTwoActive');
    const inputsCoordinador = document.getElementById('inputs_coordinador')
    const inputsSemillerista = document.getElementById('inputs_semillerista')

    // Modifica el color de fondo
    coordinadores.addEventListener('click', (event) => {
        event.preventDefault();
        inputsCoordinador.style.display = ''
        inputsSemillerista.style.display = 'none'
        coordinadores.classList.remove('nav-link-off-custom');
        coordinadores.classList.add('nav-link-custom');
        semilleristas.classList.remove('nav-link-custom');
        semilleristas.classList.add('nav-link-off-custom');
    });
    semilleristas.addEventListener('click', (event) => {
        event.preventDefault();
        inputsCoordinador.style.display = 'none'
        inputsSemillerista.style.display = ''
        semilleristas.classList.remove('nav-link-off-custom');
        semilleristas.classList.add('nav-link-custom');
        coordinadores.classList.remove('nav-link-custom');
        coordinadores.classList.add('nav-link-off-custom');
    });
</script>