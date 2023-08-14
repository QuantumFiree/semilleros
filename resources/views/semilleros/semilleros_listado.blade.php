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
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-800 text-right leading-tight">
                {{ __('Listado de semilleros') }}
            </h2>
            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
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
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Codigo</th>
                                    <th class="p-3">Archivo</th>
                                    <th class="p-3">Coordinador </th>
                                    <th class="p-3 text-left">Acciones</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($semilleros as $semillero)
                                <tr class="bg-gray-700">
                                    <td class="p-3 text-center">{{ $semillero->nombre }}</td>
                                    <td class="p-3 text-center">{{ $semillero->cod_semillero }}</td>
                                    <td class="p-3 text-center">
                                        <a href="#" class="text-gray-400 hover:text-gray-100">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                    <td class="p-3 text-center">
                                        @if ($semillero->cod_coordinador)
                                            {{ $semillero->coordinador->nombres }} {{ $semillero->coordinador->apellidos }}
                                        @else
                                            N/A
                                        @endif
                                    </td>

                                    <td class="p-3 text-center">

                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2 view-semillero"
                                                data-nombre="{{ $semillero->nombre }}"
                                                data-cod-semillero="{{ $semillero->cod_semillero }}"
                                                data-correo="{{ $semillero->correo }}"
                                                data-descripcion="{{ $semillero->descripcion }}"
                                                data-mision="{{ $semillero->mision }}"
                                                data-vision="{{ $semillero->vision }}"
                                                data-valores="{{ $semillero->valores }}"
                                                data-objetivo="{{ $semillero->objetivo}}"
                                                data-lineas_investigacion="{{ $semillero->lineas_investigacion}}"
                                                data-presentacion="{{ $semillero->presentacion}}"
                                                data-fecha_creacion="{{ $semillero->fecha_creacion}}"
                                                data-numero_resolucion="{{ $semillero->numero_resolucion}}"
                                                data-cod_coordinador="{{ $semillero->cod_coordinador}}"
                                                data-logo="{{ asset('storage/logos/' . $semillero->logo) }}"
                                                >
                                                    <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('editar_semillero', ['id' => $semillero->cod_semillero]) }}" class="text-blue-500 hover:text-blue-700 mx-2">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="{{ route('eliminar_semillero', ['id' => $semillero->cod_semillero]) }}" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); document.getElementById('eliminar-form-{{ $semillero->cod_semillero }}').submit();">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <form id="eliminar-form-{{ $semillero->cod_semillero }}" action="{{ route('eliminar_semillero', ['id' => $semillero->cod_semillero]) }}" method="POST" style="display: none;">
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
    </div>

    <div id="modal-container" class="hidden fixed inset-0 overflow-y-auto flex justify-center items-center z-50 bg-gray-900 bg-opacity-50">
        <div class="modal-content-wrapper bg-gray-700 text-white p-4 rounded z-10 relative">
            <h2 class="font-semibold text-xl mb-4 text-center">Detalles del Semillero</h2>
            @isset($semillero)
                <img id="semillero-logo" class="mx-auto d-block h-24 w-24 rounded-full object-cover" src="{{ asset('storage/' . $semillero->logo) }}" alt="{{ $semillero->nombre }}" />
            @endisset
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="text-white"><strong>Nombre:</strong></td>
                                <td class="text-white" id="semillero-nombre"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Código:</strong></td>
                                <td class="text-white" id="semillero-cod-semillero"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Correo:</strong></td>
                                <td class="text-white" id="semillero-correo"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Descripción:</strong></td>
                                <td class="text-white" id="semillero-descripcion"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Misión:</strong></td>
                                <td class="text-white" id="semillero-mision"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Visión:</strong></td>
                                <td class="text-white"  id="semillero-vision"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Valores:</strong></td>
                                <td class="text-white" id="semillero-valores"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Objetivo:</strong></td>
                                <td class="text-white" id="semillero-objetivo"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Líneas de investigación:</strong></td>
                                <td class="text-white" id="semillero-lineas-investigacion"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Presentación:</strong></td>
                                <td class="text-white" id="semillero-presentacion"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Fecha de creación:</strong></td>
                                <td class="text-white" id="semillero-fecha-creacion"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Número de resolución:</strong></td>
                                <td class="text-white" id="semillero-numero-resolucion"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Código de coordinador:</strong></td>
                                <td class="text-white" id="semillero-cod-coordinador"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        <button id="close-modal" class="px-4 py-2 bg-blue-500 text-black rounded">Cerrar</button>
                    </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('registro.semillero') }}" class="px-4 py-2 bg-green-500 text-black rounded">Agregar otro semillero</a>
    </div>

    <script>
        function openModal(semillero) {
            document.getElementById('semillero-nombre').innerText = semillero.nombre;
            document.getElementById('semillero-cod-semillero').innerText = semillero.cod_semillero;
            document.getElementById('semillero-correo').innerText = semillero.correo;
            document.getElementById('semillero-descripcion').innerText = semillero.descripcion;
            document.getElementById('semillero-mision').innerText = semillero.mision;
            document.getElementById('semillero-vision').innerText = semillero.vision;
            document.getElementById('semillero-valores').innerText = semillero.valores;
            document.getElementById('semillero-objetivo').innerText = semillero.objetivo;
            document.getElementById('semillero-lineas-investigacion').innerText = semillero.lineas_investigacion;
            document.getElementById('semillero-presentacion').innerText = semillero.presentacion;
            document.getElementById('semillero-fecha-creacion').innerText = semillero.fecha_creacion;
            document.getElementById('semillero-numero-resolucion').innerText = semillero.numero_resolucion;
            // document.getElementById('semillero-logo').src = "{{ asset('storage/logos') }}/" + semillero.logo;
            document.getElementById('semillero-logo').style.verticalAlign = 'middle';
            document.getElementById('semillero-logo').alt = 'Logo del semillero';
            document.getElementById('semillero-cod-coordinador').innerText = semillero.cod_coordinador;
            document.getElementById('modal-container').classList.remove('hidden');
        }


        function closeModal() {
        document.getElementById('modal-container').classList.add('hidden');
        }

        document.getElementById('close-modal').addEventListener('click', function() {
            closeModal();
        });


        document.querySelectorAll('.view-semillero').forEach(function(button) {
            button.addEventListener('click', function() {

                var semilleroNombre = button.getAttribute('data-nombre');
                var semilleroCodigo = button.getAttribute('data-cod-semillero');
                var semilleroCorreo = button.getAttribute('data-correo');
                var semilleroDescripcion = button.getAttribute('data-descripcion');
                var semilleroMision = button.getAttribute('data-mision');
                var semilleroVision = button.getAttribute('data-vision');
                var semilleroValores = button.getAttribute('data-valores');
                var semilleroObjetivo = button.getAttribute('data-objetivo');
                var semilleroLineasDeInvestigacion = button.getAttribute('data-lineas_investigacion');
                var semilleroPresentacion= button.getAttribute('data-presentacion');
                var semillerofechaCreacion = button.getAttribute('data-fecha_creacion');
                var semilleroNumerodeResolucion = button.getAttribute('data-numero_resolucion');
                var semilleroLogo = button.getAttribute('data-logo');
                var semilleroCodigoCoordinador = button.getAttribute('data-cod_coordinador');

                var semilleroData = {
                    nombre: semilleroNombre,
                    cod_semillero: semilleroCodigo,
                    correo: semilleroCorreo,
                    descripcion: semilleroDescripcion,
                    mision: semilleroMision,
                    vision: semilleroVision,
                    valores: semilleroValores,
                    objetivo: semilleroObjetivo,
                    lineas_investigacion: semilleroLineasDeInvestigacion,
                    presentacion: semilleroPresentacion,
                    fecha_creacion: semillerofechaCreacion,
                    numero_resolucion: semilleroNumerodeResolucion,
                    logo:semilleroLogo,
                    cod_coordinador: semilleroCodigoCoordinador,
                };
                openModal(semilleroData);
            });
        });

    </script>


</x-app-layout>
