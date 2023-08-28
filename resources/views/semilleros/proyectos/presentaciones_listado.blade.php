<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }


    .container-form {
        width: 800px;
        margin-top: 30px;
    }


    .input-custom {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        margin-bottom: 5px;
    }


    .button-custom {
        padding: 10px 20px;
        font-size: 16px;
    }


    .font-semibold.text-xl {
        font-size: 24px;
        margin-bottom: 20px;
        text-align: center;
    }


    .two-columns-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }


    .text-red-600 {
        margin-left: auto;
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <div >
            <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Listado de Presentaciones') }}
            </h2>
        </div>
    </x-slot>
    <div class="min-h-xl flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="container-custom w-full sm:max-w-4xl px-4 pt-3 pb-8 mt-3 shadow-md overflow-hidden sm:rounded-lg bg-gray-300">
            <div class="container-list-custom flex items-baseline justify-center bg-gray-300 overflow-auto">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                        <table class="table text-gray-400 border-separate space-y-6 text-sm">
                            <thead class="bg-gray-700 text-green-400">
                                <tr>
                                    <th class="p-3">Codigo</th>
                                    <th class="p-3 text-center">Participacion</th>
                                    <th class="p-3 text-center">Evento</th>
                                    <th class="p-3 text-center">Proyecto</th>
                                    <th class="p-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($presentaciones as $presentacion)

                                    <tr class="bg-gray-700">
                                        <td class="px-4 py-2 border text-center">{{ $presentacion->cod_presentacion_proyecto }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $presentacion->participacion }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $presentacion->evento->nombre }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $presentacion->proyecto->titulo }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <a href="{{ route('eliminar_presentacion', ['cod_presentacion_proyecto' => $presentacion->cod_presentacion_proyecto]) }}" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); document.getElementById('eliminar-form-{{ $presentacion->cod_presentacion_proyecto }}').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <form id="eliminar-form-{{ $presentacion->cod_presentacion_proyecto }}" action="{{ route('eliminar_presentacion', ['cod_presentacion_proyecto' => $presentacion->cod_presentacion_proyecto]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
