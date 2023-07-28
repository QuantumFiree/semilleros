<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    

    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('navigation-menu')

            <!-- Si no hay sección "content" definida, muestra un mensaje informativo -->
            @section('content')
                <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            {{ __('Contenido predeterminado para esta sección. Proporciona tu propio contenido en las vistas que extienden este diseño.') }}
                        </div>
                    </div>
                </div>
            @show
        </div>
    </body>
</html>
