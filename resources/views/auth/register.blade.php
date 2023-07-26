<x-guest-layout>
<<<<<<< HEAD
    <style>
        /* En tu hoja de estilos CSS */
        .container-auth {
            padding: 20px 50px 30px 50px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
            background-color: rgb(31, 41, 55)
        }

        .nav-custom {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            gap: 10px;
            width: 300px;
            margin: auto;
            margin-bottom: 30px;
            margin-top: 10px;
            border: 1px solid rgb(31, 41, 55);
            border-radius: 5px;
            background-color: rgb(31, 41, 55);
        }

        .label-custom {
            color: white;
            margin-top: 10px
        }
        .nav-link-custom {
            background-color: rgb(34, 197, 94);
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .nav-link-off-custom {
            width: 100%;
            text-align: center;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }
        .title-cuenta{
            color: rgb(31, 41, 55);
            display: inline-block;
            margin-left: 170px;
            margin-top: 10px;
            font-weight: bold;
        }
        .title-auth {
            color: rgb(31, 41, 55);
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 25px;
        }
    </style>
=======
>>>>>>> 43a342b14576279d29ae3ec517f7e67a4222960a
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
<<<<<<< HEAD
        
        <h1 class="title-auth">REGISTRO</h1>
        <form id="formUser" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="container-auth">
                <div>
                    <x-label class="label-custom" for="email" value="{{ __('Correo Electronico') }}" />
                    <x-input id="email" class="block mt-1 w-full border border-green-500 border-2" type="email" name="email" :value="old('email')" required autocomplete="username" />
                </div>
=======

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
>>>>>>> 43a342b14576279d29ae3ec517f7e67a4222960a

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

<<<<<<< HEAD
                <div>
                    <x-label class="label-custom" for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full border border-green-500 border-2" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div style="display:none">
                    <x-input id="inputRol" class="block mt-1 w-full border border-green-500 border-2" type="text" name="rol" autocomplete="rol" value="coordinador" />
                </div>
                <div style="display:none">
                    <x-input id="estado" class="block mt-1 w-full border border-green-500 border-2" type="text" name="estado" autocomplete="estado" value="estado" />
                </div>
=======
            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
>>>>>>> 43a342b14576279d29ae3ec517f7e67a4222960a
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
<<<<<<< HEAD
<script>
    // input rol
    const inputRol = document.getElementById('inputRol');
    // Formulario User
    const buttonFormUser = document.getElementById('buttonFormUser');
    const formUser = document.getElementById('formUser');
    const inputEstado = document.getElementById('estado');

    buttonFormUser.addEventListener('click', (event) => {
        event.preventDefault();
        inputEstado.value = 'inactivo';
        localStorage.setItem('tipoCuenta', inputRol.value);
        formUser.submit();
    });
    // Obtén la etiqueta <nav> por su ID
    const coordinadores = document.getElementById('linkOneActive');
    const semilleristas = document.getElementById('linkTwoActive');

    

    // Modifica el color de fondo
    coordinadores.addEventListener('click', (event) => {
        event.preventDefault();
        inputRol.value = 'coordinador';
        coordinadores.classList.remove('nav-link-off-custom');
        coordinadores.classList.add('nav-link-custom');
        semilleristas.classList.remove('nav-link-custom');
        semilleristas.classList.add('nav-link-off-custom');
    });
    semilleristas.addEventListener('click', (event) => {
        event.preventDefault();
        inputRol.value = 'semillerista';
        semilleristas.classList.remove('nav-link-off-custom');
        semilleristas.classList.add('nav-link-custom');
        coordinadores.classList.remove('nav-link-custom');
        coordinadores.classList.add('nav-link-off-custom');
    });
</script>
=======
>>>>>>> 43a342b14576279d29ae3ec517f7e67a4222960a
