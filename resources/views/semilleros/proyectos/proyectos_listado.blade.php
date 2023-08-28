<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 80vh;
    }

    .container-form {
        width: 800px;
    }


    .button-custom {
        padding: 10px 20px;
        font-size: 16px;
    }

    .two-columns-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }



    .table {
        border-spacing: 0 15px;
    }

    i {
        font-size: 1rem !important;
    }

    .table tr {
        border-radius: 20px;
    }

    tr td:nth-child(n+6),
    tr th:nth-child(n+6) {
        border-radius: 0 .625rem .625rem 0;
    }

    tr td:nth-child(1),
    tr th:nth-child(1) {
        border-radius: .625rem 0 0 .625rem;
    }

    .container-custom {
        height: 520px;
    }

    .container-list-custom {
        height: 480;
    }
</style>

<link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet">
<link href="https://unpkg.com/@popperjs/core@2">
<x-app-layout>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />

    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight text-start">
                {{ __('Listado proyectos') }}
            </h2>
            <h1 class="justify-self-end text-end font-bold text-xl text-yellow-400">
                {{ __(auth()->user()->rol) }}
            </h1>
        </div>
    </x-slot>
    <div id="tooltip-right" role="tooltip" class="absolute mt-10 z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        Nuevo Proyecto
        <div class="tooltip-arrow mt-10" data-popper-arrow></div>
    </div>
    <a
    href="{{ route('registro.proyecto') }}"
        data-tooltip-target="tooltip-right"
        style="position: absolute; top: 10.5rem; right: 15rem"
        class=
        "
            bg-gray-600
            hover:bg-gray-700
            text-white font-bold
            py-2
            px-3
            border-b-4
            border-green-400
            hover:border-green-500
            rounded
        "
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" />
          </svg>

    </a>


    <div class="min-h-xl flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div
            class="container-custom w-5xl sm:max-w-4xl px-3 shadow-md overflow-hidden sm:rounded-lg bg-gray-200">
            <div class="w-full container-list-custom flex items-baseline justify-center bg-transparent overflow-auto">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">

                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-700 text-green-400">
                                <tr>
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Propuesta</th>
                                    <th class="p-3">Estado</th>
                                    <th class="p-3">No. de participantes</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proyectos as $proyecto)
                                    <tr class="bg-gray-700">
                                        <td class="p-3 text-center">{{ $proyecto->titulo }}</td>
                                        <td class="p-3">
                                            <a data-bs-toggle="modal" data-bs-target="#{{ $proyecto->cod_proyecto }}"
                                                href="#" class="text-amber-500 hover:text-gray-100 mr-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="ml-4 w-6 h-6">
                                                    <path
                                                        d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" />
                                                    <path fill-rule="evenodd"
                                                        d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z"
                                                        clip-rule="evenodd" />
                                                    <path
                                                        d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                                                </svg>

                                            </a>
                                        </td>
                                        <td class="p-3 text-center">{{ $proyecto->estado }}</td>
                                        <td class="p-3 text-center">{{ $proyecto->numero_participantes }}</td>

                                        <td class="p-3 text-center">

                                            <a data-bs-toggle="modal"
                                                data-bs-target="#{{ '2' . $proyecto->cod_proyecto }}" href="#"
                                                class="text-gray-400 hover:text-gray-100 mr-2">
                                                <i class="material-icons-outlined text-base">visibility</i>
                                            </a>
                                            <a href="{{route('editar_proyecto', ['cod_proyecto' => $proyecto->cod_proyecto])}}" class="text-gray-400 hover:text-gray-100  mx-2">
                                                <i class="material-icons-outlined text-base">edit</i>
                                            </a>

                                            <a href="" type=''
                                                class="text-gray-400 hover:text-red-500  ml-2"><i
                                                    class="material-icons-round text-base">delete_outline</i></a>

                                            <form id="eliminar-form-{{ $proyecto->cod_proyecto }}"
                                                action="{{ route('eliminar_proyecto', [$proyecto->cod_proyecto]) }}"
                                                method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="{{ $proyecto->cod_proyecto }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    @if ($proyecto->estado != 'Terminado')
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6 text-green-500">
                                                            <path fill-rule="evenodd"
                                                                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6 text-red-700">
                                                            <path fill-rule="evenodd"
                                                                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif
                                                    <h1 class="font-extrabold text-lg text-center w-full"
                                                        id="">Reporte de matricula</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed src="{{ asset('storage/' . $proyecto->propuesta) }}"
                                                        type="application/pdf" width="100%" height="500px">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                                    {{ __('Cerrar') }}
                                                </x-button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="{{ '2' . $proyecto->cod_proyecto }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-md">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    @if ($proyecto->estado != 'Terminado')
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6 text-green-500">
                                                            <path fill-rule="evenodd"
                                                                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            fill="currentColor" class="w-6 h-6 text-red-700">
                                                            <path fill-rule="evenodd"
                                                                d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    @endif



                                                    <h1 class="w-full text-center font-extrabold"
                                                        id="exampleModalLabel">Detalles del proyecto</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg"
                                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor" class="w-6 h-6">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M6 18L18 6M6 6l12 12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body bg-gray-700">

                                                    <h2 class="mb-3 text-lg font-extrabold text-gray-100 text-center">
                                                        {{ $proyecto->titulo }}</h2>

                                                    <hr class="border-amber-500 border-2 opacity-50">
                                                    <div class="flex mt-3">
                                                        <ul
                                                            class="max-w-md space-y-1 list-none list-inside dark:text-gray-400 w-1/2 pr-1">
                                                            <li class="flex justify-end space-x-5">
                                                                <p class="text-green-400">
                                                                    Semillero
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-end space-x-5">
                                                                <p class="text-green-400">
                                                                    Tipo de proyecto
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-end space-x-5">
                                                                <p class="text-green-400">
                                                                    Estado
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-end space-x-5">
                                                                <p class="text-green-400">
                                                                    Fecha inicio
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-end space-x-5">
                                                                <p class="text-green-400">
                                                                    Fecha finalizacion
                                                                </p>
                                                            </li>
                                                        </ul>
                                                        <ul
                                                            class="max-w-md space-y-1 list-none list-inside dark:text-gray-200 w-1/2 pl-1">
                                                            <li class="flex justify-start space-x-5">
                                                                <p class="text-gray-200">
                                                                    {{ 'semillero' }}
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-start space-x-5">
                                                                <p class="truncate text-gray-200">
                                                                    {{ $proyecto->tipo_proyecto }}
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-start space-x-5">
                                                                <p class="text-gray-200">
                                                                    {{ $proyecto->estado }}
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-start space-x-5">
                                                                <p class="text-gray-200">
                                                                    {{ $proyecto->fecha_inicio }}
                                                                </p>
                                                            </li>
                                                            <li class="flex justify-start space-x-5">
                                                                <p class="text-gray-200">
                                                                    {{ $proyecto->fecha_finalizacion }}
                                                                </p>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                    <hr class="border-amber-500 border-2 opacity-50 my-3">
                                                    @php

                                                        $participantes_proyecto = array_filter($participantes, function ($participante) use ($proyecto) {
                                                            return $participante['cod_proyecto'] === $proyecto->cod_proyecto; // Filtra números pares
                                                        });

                                                    @endphp
                                                    <div class="text-center">
                                                        <h2 class="mb-4 text-lg font-bold text-gray-200 dark:text-white">
                                                            Participantes del proyecto
                                                        </h2>
                                                        <a
                                                        href="{{ route('participantes_proyecto.create', ['cod_proyecto' => $proyecto->cod_proyecto]) }}"
                                                            style="position: absolute; top: 15.5rem; right: 1.5rem"
                                                            class=
                                                            "
                                                                bg-inherit
                                                                text-gray-200
                                                                hover:bg-gray-600
                                                                hover:text-amber-500
                                                                font-bold
                                                                py-1
                                                                px-1
                                                                rounded-full
                                                            "
                                                        >
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                            <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                                                          </svg>


                                                        </a>
                                                        <ol>
                                                            @foreach ($participantes_proyecto as $participante_proyecto)
                                                                <div class="flex mt-1">
                                                                    <div class="w-2/3" <ul
                                                                        class="max-w-md space-y-1 list-none list-inside dark:text-gray-400 w-1/2 pr-1">
                                                                        <li class="flex justify-end space-x-5">
                                                                            <div
                                                                                class="flex justify-center space-x-1 mr-4">
                                                                                <p class="text-gray-200">
                                                                                    {{ $participante_proyecto['nombres'] }}
                                                                                </p>
                                                                                <p class="text-gray-200">
                                                                                    {{ $participante_proyecto['apellidos'] }}
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="w-1/3 border-l-2 border-green-400">
                                                                        <ul
                                                                            class="max-w-md space-y-1 list-none list-inside dark:text-gray-200 w-1/2 pl-1">
                                                                            <li class="flex justify-center space-x-5">
                                                                                <a data-popover-target="{{$participante_proyecto['cod_semillerista']}}"
                                                                                    data-popover-trigger="click"
                                                                                    data-popover-placement="top"
                                                                                    type="button"><svg
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        viewBox="0 0 24 24"
                                                                                        fill="currentColor"
                                                                                        class="mt-1 w-4 h-4 text-green-400
                                                                            hover:text-amber-500
                                                                            focus:text-amber-500
                                                                            text-center">
                                                                                        <path fill-rule="evenodd"
                                                                                            d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z"
                                                                                            clip-rule="evenodd" />
                                                                                    </svg>

                                                                                </a>
                                                                                <div data-popover id="{{$participante_proyecto['cod_semillerista']}}"
                                                                                    role="tooltip"
                                                                                    class="
                                                                                        absolute
                                                                                        z-10
                                                                                        invisible
                                                                                        inline-block
                                                                                        w-64
                                                                                        text-sm
                                                                                        text-gray-500
                                                                                        transition-opacity
                                                                                        duration-300
                                                                                        bg-gray-300
                                                                                        border
                                                                                        border-gray-200
                                                                                        rounded-lg
                                                                                        shadow-sm
                                                                                        opacity-0
                                                                                        dark:text-gray-400
                                                                                        dark:border-gray-600
                                                                                        dark:bg-gray-800
                                                                                    "
                                                                                >
                                                                                    <div
                                                                                        class="
                                                                                            px-3
                                                                                            py-2
                                                                                            bg-gray-700
                                                                                            border-b
                                                                                            border-gray-200
                                                                                            rounded-t-lg
                                                                                            dark:border-gray-600
                                                                                            dark:bg-gray-700
                                                                                        "
                                                                                    >
                                                                                        <h3 class="font-semibold text-gray-200 dark:text-white">
                                                                                            {{"Codigo: " . $participante_proyecto['cod_semillerista']}}
                                                                                        </h3>
                                                                                    </div>
                                                                                    <div class="px-3 py-2">
                                                                                        <div class="flex w-full justify-center mt-2">
                                                                                            <div class="w-1/2 flex justify-center">
                                                                                                @if($participante_proyecto['profile_photo_path'])
                                                                                            <img class="h-14 w-14 rounded-full object-cover" src="{{ asset('storage/' . $participante_proyecto['profile_photo_path']) }}" alt="{{$participante_proyecto['nombres']}}" />
                                                                                            @else
                                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-14 h-14 text-gray-700">
                                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                                            </svg>
                                                                                            @endif
                                                                                            </div>
                                                                                            <div class="text-sm max-w-md space-y-1 list-none list-inside dark:text-gray-400 w-1/2 pr-1">
                                                                                                <div class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 mt-3 font-bold">
                                                                                                        {{$participante_proyecto['nombres']}}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <hr class="border-green-500 border-2 opacity-50 my-3">
                                                                                        <div class="block mt-3 ml-2">
                                                                                            <ul class="text-xs max-w-md space-y-1 list-none list-inside dark:text-gray-400 pr-1">
                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Correo
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['email']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>
                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Telefono
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['telefono']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>
                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Semestre
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['semestre']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>
                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Programa
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['nombre_programa']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>
                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Identificacion
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['identificacion']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>

                                                                                                <li class="flex justify-right space-x-5">
                                                                                                    <p class="text-green-400 font-bold">
                                                                                                        Fecha de vinculacion
                                                                                                        <span class="text-gray-700">
                                                                                                            {{$participante_proyecto['fecha_vinculacion']}}
                                                                                                        </span>
                                                                                                    </p>
                                                                                                </li>
                                                                                            </ul>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div data-popper-arrow></div>
                                                                                </div>
                                                                            </li>

                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </ol>


                                                    </div>

                                                </div>
                                                <div class="modal-footer bg-transparent justify-center">
                                                    <x-button type="button" class="" data-bs-dismiss="modal">
                                                        {{ __('Cerrar') }}
                                                    </x-button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </tbody>
                            @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>


        </x-guest-layout>
