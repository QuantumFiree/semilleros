<style>
    .table {
        border-spacing: 0 15px;
    }

    i {
        font-size: 1rem !important;
    }

    .table tr {
        border-radius: 20px;
    }

    tr td:nth-child(n+5),
    tr th:nth-child(n+5) {
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

    thead th {
        position: sticky;
        top: 0;
        /* Color de fondo de la cabecera */
        /* Otros estilos de diseño de la cabecera */
    }

    thead tr {
        position: sticky;
        top: 0;
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Listado semilleristas') }}
            </h2>
        </div>
    </x-slot>
    

    <div class="min-h-xl flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        
        <div class="container-custom w-full sm:max-w-4xl px-4 pt-3 pb-8 mt-3 shadow-md overflow-hidden sm:rounded-lg bg-gray-200">
            <!-- component -->
            <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
            <div class="container-list-custom flex items-baseline justify-center bg-gray-200 overflow-auto">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead>
                                <tr class="bg-gray-700 text-green-400">
                                    <th class="p-3">Semillerista</th>
                                    <th class="p-3 text-left">Reporte</th>
                                    <th class="p-3 text-left">Semillero</th>
                                    <th class="p-3 text-left">Estado</th>
                                    <th class="p-3 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $editar = 0;
                                @endphp
                                @foreach($semilleristas as $semillerista)
                                @php
                                $editar++;
                                @endphp
                                <tr class="bg-gray-700">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <div class="ml-3">
                                                <div class="text-gray-200">{{$semillerista->nombres}}
                                                    {{$semillerista->apellidos}}
                                                </div>
                                                <div class="text-gray-200">{{$semillerista->cod_semillerista}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <div class="ml-4">

                                                <a data-bs-toggle="modal" data-bs-target="#{{$semillerista->cod_estudiantil}}" href="#" class="text-amber-500 hover:text-gray-100 mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                                        <path d="M11.625 16.5a1.875 1.875 0 100-3.75 1.875 1.875 0 000 3.75z" />
                                                        <path fill-rule="evenodd" d="M5.625 1.5H9a3.75 3.75 0 013.75 3.75v1.875c0 1.036.84 1.875 1.875 1.875H16.5a3.75 3.75 0 013.75 3.75v7.875c0 1.035-.84 1.875-1.875 1.875H5.625a1.875 1.875 0 01-1.875-1.875V3.375c0-1.036.84-1.875 1.875-1.875zm6 16.5c.66 0 1.277-.19 1.797-.518l1.048 1.048a.75.75 0 001.06-1.06l-1.047-1.048A3.375 3.375 0 1011.625 18z" clip-rule="evenodd" />
                                                        <path d="M14.25 5.25a5.23 5.23 0 00-1.279-3.434 9.768 9.768 0 016.963 6.963A5.23 5.23 0 0016.5 7.5h-1.875a.375.375 0 01-.375-.375V5.25z" />
                                                    </svg>

                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3 font-semibold text-gray-400">
                                        {{$semillerista->nombre}}
                                    </td>
                                    <td class="p-3">
                                        @if($semillerista->estado == 'activo')
                                        <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @elseif($semillerista->estado == 'pendiente')
                                        <span class="bg-yellow-500 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @else
                                        <span class="bg-red-500 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @endif
                                    </td>
                                    <td class="p-3 ">
                                        <a data-bs-toggle="modal" data-bs-target="#{{$semillerista->cod_semillerista}}" href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="{{ route('perfilSemilleristaView', ['cod_semillerista' => $semillerista->id]) }}" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        
                                        <a href="{{route('eliminarSemillerista', ['cod_semillerista'=>$semillerista->cod_semillerista])}}" type='' class="text-gray-400 hover:text-red-500  ml-2"><i class="material-icons-round text-base">delete_outline</i></a>


                                    </td>
                                </tr>
                                <div class="modal fade" id="{{$semillerista->cod_semillerista}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-md">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                @if ($semillerista->estado == 'activo')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                                </svg>
                                                @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-700">
                                                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                                </svg>
                                                @endif



                                                <h1 class="w-full text-center font-extrabold" id="exampleModalLabel">Datos Personales</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body bg-gray-700">

                                                <h2 class="mb-2 text-lg font-extrabold text-gray-100 text-center">{{$semillerista->nombres}} {{$semillerista->apellidos}}</h2>
                                                <div class="flex w-full justify-center mb-3">
                                                    @if($semillerista->profile_photo_path)
                                                    <img class="h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $semillerista->profile_photo_path) }}" alt="{{ $semillerista->nombres }}" />
                                                    @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 text-green-400">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>



                                                    @endif
                                                </div>
                                                <hr class="border-amber-500 border-2 opacity-50">
                                                <div class="flex mt-3">
                                                    <ul class="max-w-md space-y-1 list-none list-inside dark:text-gray-400 w-1/2 pr-1">
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Identificacion
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Direccion
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Telefono
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Correo
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Fecha nacimiento
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Fecha de vinculacion
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Semestre
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Codigo estudiantil
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Semillero
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-end space-x-5">
                                                            <p class="text-green-400">
                                                                Programa
                                                            </p>
                                                        </li>

                                                    </ul>
                                                    <ul class="max-w-md space-y-1 list-none list-inside dark:text-gray-200 w-1/2 pl-1">
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->identificacion}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->direccion}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->telefono}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->email}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->fecha_nacimiento}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->fecha_vinculacion}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->semestre}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->cod_estudiantil}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->nombre}}
                                                            </p>
                                                        </li>
                                                        <li class="flex justify-start space-x-5">
                                                            <p class="text-gray-200">
                                                                {{$semillerista->nombre_programa}}
                                                            </p>
                                                        </li>

                                                    </ul>
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
                                <div class="modal fade" id="{{$semillerista->cod_estudiantil}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                @if ($semillerista->estado == 'activo')
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-500">
                                                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                                </svg>
                                                @else
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-red-700">
                                                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 01.75.75v9a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM6.166 5.106a.75.75 0 010 1.06 8.25 8.25 0 1011.668 0 .75.75 0 111.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 011.06 0z" clip-rule="evenodd" />
                                                </svg>
                                                @endif
                                                <h1 class="font-extrabold text-lg text-center w-full" id="2{{$semillerista->cod_semillerista}}">Reporte de matricula</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <embed src="{{ asset('storage/' . $semillerista->reporte_matricula) }}" type="application/pdf" width="100%" height="500px">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                                {{ __('Cerrar') }}
                                            </x-button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>