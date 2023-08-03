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
</style>
<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Listado semilleristas') }}
            </h2>
            <h2 class="font-bold text-xl text-red-600 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-xl flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="container-custom w-full sm:max-w-4xl px-4 pt-3 pb-8 mt-3 shadow-md overflow-hidden sm:rounded-lg bg-gray-300">
            <!-- component -->
            <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
            <div class="container-list-custom flex items-baseline justify-center bg-gray-300 overflow-auto">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-700 text-green-400">
                                <tr>
                                    <th class="p-3">Semillerista</th>
                                    <th class="p-3 text-left">Programa</th>
                                    <th class="p-3 text-left">Semillero</th>
                                    <th class="p-3 text-left">Estado</th>
                                    <th class="p-3 text-left">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semilleristas as $semillerista)
                                <tr class="bg-gray-700">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <div class="ml-3">
                                                <div class="text-gray-200">{{$semillerista->nombres}}
                                                {{$semillerista->apellidos}}
                                                </div>
                                                <div class="text-gray-200">{{$semillerista->email}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        {{$semillerista->nombre_programa}}
                                    </td>
                                    <td class="p-3 font-bold">
                                        {{$semillerista->nombre}}
                                    </td>
                                    <td class="p-3">
                                        @if($semillerista->estado == 'activo')
                                        <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @else
                                        <span class="bg-red-500 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @endif
                                    </td>
                                    <td class="p-3 ">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                            <i class="material-icons-round text-base">delete_outline</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @foreach($semilleristas as $semillerista)
                                <tr class="bg-gray-700">
                                    <td class="p-3">
                                        <div class="flex align-items-center">
                                            <div class="ml-3">
                                                <div class="text-gray-200">{{$semillerista->nombres}}
                                                {{$semillerista->apellidos}}
                                                </div>
                                                <div class="text-gray-200">{{$semillerista->email}}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-3">
                                        {{$semillerista->nombre_programa}}
                                    </td>
                                    <td class="p-3 font-bold">
                                        {{$semillerista->nombre}}
                                    </td>
                                    <td class="p-3">
                                        @if($semillerista->estado == 'activo')
                                        <span class="bg-green-400 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @else
                                        <span class="bg-red-500 text-gray-50 rounded-md px-2">{{$semillerista->estado}}</span>
                                        @endif
                                    </td>
                                    <td class="p-3 ">
                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2">
                                            <i class="material-icons-outlined text-base">visibility</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  mx-2">
                                            <i class="material-icons-outlined text-base">edit</i>
                                        </a>
                                        <a href="#" class="text-gray-400 hover:text-gray-100  ml-2">
                                            <i class="material-icons-round text-base">delete_outline</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>
