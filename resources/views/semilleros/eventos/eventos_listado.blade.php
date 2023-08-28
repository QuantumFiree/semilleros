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

    tr td:nth-child(n+3),
    tr th:nth-child(n+3) {
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
                {{ __('Listado de Eventos') }}
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
                                    <th class="p-3 text-center">Nombre</th>
                                    <th class="p-3 text-center">Codigo</th>
                                    <th class="p-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventos as $evento)
                                    <tr class="bg-gray-700">
                                        <td class="px-4 py-2 border text-center">{{ $evento->nombre }}</td>
                                        <td class="px-4 py-2 border text-center">{{ $evento->cod_evento }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <a href="#" class="text-gray-400 hover:text-gray-100 mr-2 view-evento"
                                                    data-cod-evento="{{ $evento->cod_evento }}"
                                                    data-nombre="{{ $evento->nombre }}"
                                                    data-descripcion="{{ $evento->descripcion }}"
                                                    data-fecha-inicio="{{ $evento->fecha_inicio }}"
                                                    data-fecha-fin="{{ $evento->fecha_fin }}"
                                                    data-lugar="{{ $evento->lugar }}"
                                                    data-tipo="{{ $evento->tipo}}"
                                                    data-modalidad="{{ $evento->modalidad}}"
                                                    data-clasificacion="{{ $evento->clasificacion}}"
                                                    >
                                                        <i class="far fa-eye"></i>
                                            </a>

                                            <a href="{{ route('editar_evento', [$evento->cod_evento]) }}" class="text-blue-500 hover:text-blue-700 mx-2" >
                                                <i class="far fa-edit"></i>
                                            </a>

                                            <a href="{{ route('eliminar_evento', [ $evento->cod_evento]) }}" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); document.getElementById('eliminar-form-{{  $evento->cod_evento }}').submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <form id="eliminar-form-{{ $evento->cod_evento }}" action="{{ route('eliminar_evento', [ $evento->cod_evento]) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                @if(session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="modal-container" class="hidden fixed inset-0 overflow-y-auto flex justify-center items-center z-50 bg-gray-900 bg-opacity-50">
        <div class="modal-content-wrapper bg-gray-700 text-white p-4 rounded z-10 relative">
            <h2 class="font-semibold text-xl mb-4 text-center">Detalles del Evento</h2>
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="text-[#47c979]"><strong>Nombre:</strong></td>
                                <td class="text-white" id="evento-nombre"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Código:</strong></td>
                                <td class="text-white" id="evento-cod-evento"></td>
                            </tr>

                            <tr>
                                <td class="text-[#47c979]"><strong>Descripción:</strong></td>
                                <td class="text-white" id="evento-descripcion"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Fecha de Inicio:</strong></td>
                                <td class="text-white" id="evento-fecha-inicio"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Fecha de finalización:</strong></td>
                                <td class="text-white"  id="evento-fecha-fin"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Lugar:</strong></td>
                                <td class="text-white" id="evento-lugar"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Tipo:</strong></td>
                                <td class="text-white" id="evento-tipo"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Modalidad:</strong></td>
                                <td class="text-white" id="evento-modalidad"></td>
                            </tr>
                            <tr>
                                <td class="text-[#47c979]"><strong>Clasificación:</strong></td>
                                <td class="text-white" id="evento-clasificacion"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        <button id="close-modal" class="px-4 py-2 bg-[#00923f] text-white rounded">Cerrar</button>
                    </div>
        </div>
    </div>


    <div class="flex justify-center mt-4">
        <a href="{{ route('registro.evento') }}" class="px-4 py-2 bg-[#00923f] text-white rounded">Agregar otro Evento</a>
    </div><br>

    <script>
        // Función para abrir el modal cuando se hace clic en el botón del ojo
        function openModal(evento) {
            document.getElementById('evento-cod-evento').innerText = evento.cod_evento;
            document.getElementById('evento-nombre').innerText = evento.nombre;
            document.getElementById('evento-descripcion').innerText = evento.descripcion;
            document.getElementById('evento-fecha-inicio').innerText = evento.fecha_inicio;
            document.getElementById('evento-fecha-fin').innerText = evento.fecha_fin;
            document.getElementById('evento-lugar').innerText = evento.lugar;
            document.getElementById('evento-tipo').innerText = evento.tipo;
            document.getElementById('evento-modalidad').innerText = evento.modalidad;
            document.getElementById('evento-clasificacion').innerText = evento.clasificacion;

            document.getElementById('modal-container').classList.remove('hidden');
        }

        // Función para cerrar el modal cuando se hace clic en el botón de cerrar
        function closeModal() {
        document.getElementById('modal-container').classList.add('hidden');
        }

        // Escuchar el clic en el botón de cerrar y cerrar el modal
        document.getElementById('close-modal').addEventListener('click', function() {
            closeModal();
        });

        // Escuchar el clic en el botón del ojo y abrir el modal
        document.querySelectorAll('.view-evento').forEach(function(button) {
            button.addEventListener('click', function() {
                // Obtener los datos del semillero desde los atributos "data-nombre" y "data-cod-semillero" en el enlace
                var eventoCodigo = button.getAttribute('data-cod-evento');
                var eventoNombre = button.getAttribute('data-nombre');
                var eventoDescripcion = button.getAttribute('data-descripcion');
                var eventoFechaInicio = button.getAttribute('data-fecha-inicio');
                var eventoFechaFin = button.getAttribute('data-fecha-fin');
                var eventoLugar = button.getAttribute('data-lugar');
                var eventoTipo = button.getAttribute('data-tipo');
                var eventoModalidad = button.getAttribute('data-modalidad');
                var eventoClasificacion = button.getAttribute('data-clasificacion');


                var eventoData = {
                    cod_evento: eventoCodigo,
                    nombre: eventoNombre,
                    descripcion: eventoDescripcion,
                    fecha_inicio: eventoFechaInicio,
                    fecha_fin: eventoFechaFin,
                    lugar: eventoLugar,
                    tipo: eventoTipo,
                    modalidad: eventoModalidad,
                    clasificacion:eventoClasificacion,
                };
                openModal(eventoData);
            });
        });

    </script>
</x-guest-layout>
