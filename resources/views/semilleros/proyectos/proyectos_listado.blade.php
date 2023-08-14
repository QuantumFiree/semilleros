
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
            <h2 class="font-semibold text-xl text-blue-800 text-center leading-tight">
                {{ __('Listado de Proyectos') }}
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
                                    <th class="p-3">Estado</th>
                                    <th class="p-3">Presentacion</th>
                                    <th class="p-3">Participantes</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($proyectos as $proyecto)
                                <tr class="bg-gray-700">
                                    <td class="p-3 text-center">{{ $proyecto->titulo}}</td>
                                    <td class="p-3 text-center">{{ $proyecto->cod_proyecto }}</td>
                                    <td class="p-3 text-center">{{ $proyecto->estado }}</td>
                                    <td class="p-3 text-center">
                                        @if ($proyecto->formulario_presentado)
                                            <i class="far fa-check-circle text-blue-500"></i>
                                        @else
                                            <a href="{{ route('presentar_proyecto', [$proyecto->cod_proyecto]) }}" class="text-blue-500 hover:text-blue-700">
                                                Agregar presentación
                                            </a>
                                        @endif
                                    </td>
                                    <td class="p-3 text-center" >
                                    @php
                                        $proyectosData = [];

                                        foreach ($proyectosConParticipantes as $proyectoConParticipantes) {
                                            $proyectoData = [];

                                            if ($proyectoConParticipantes['proyecto']->cod_proyecto == $proyecto->cod_proyecto) {
                                                $proyectoData['titulo'] = $proyectoConParticipantes['proyecto']->titulo;
                                                $participantes = [];

                                                foreach ($proyectoConParticipantes['participantes'] as $participante) {
                                                    $participantes[] = $participante->nombres;
                                                }

                                                $proyectoData['participantes'] = $participantes;
                                            }

                                            $proyectosData[$proyecto->cod_proyecto] = $proyectoData;
                                        }
                                    @endphp
                                        <a href="#" class="text-blue-500 hover:text-blue-700 view-participantes"
                                        data-proyecto-data="{{ json_encode($proyectosData) }}"
                                        data-cod-proyecto = "{{ $proyecto->cod_proyecto }}"
                                        >
                                            Ver participantes
                                        </a>
                                    </td>
                                    <td class="p-3 text-center">

                                        <a href="#" class="text-gray-400 hover:text-gray-100 mr-2 view-proyecto"
                                                data-cod-proyecto="{{ $proyecto->cod_proyecto }}"
                                                data-titulo="{{ $proyecto->titulo }}"
                                                data-cod-semillero="{{ $proyecto->cod_semillero }}"
                                                data-tipo-proyecto="{{ $proyecto->tipo_proyecto}}"
                                                data-estado="{{ $proyecto->estado }}"
                                                data-fecha-inicio="{{ $proyecto->fecha_inicio}}"
                                                data-fecha-finalizacion="{{ $proyecto->fecha_finalizacion}}"
                                                data-propuesta="{{ $proyecto->propuesta}}"
                                                data-proyecto-final="{{ $proyecto->proyecto_final }}"
                                                >
                                                    <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('editar_proyecto', [$proyecto->cod_proyecto]) }}" class="text-blue-500 hover:text-blue-700 mx-2" onclick="event.preventDefault(); document.getElementById('editar-form-{{ $proyecto->cod_proyecto }}').submit();">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form id="editar-form-{{ $proyecto->cod_proyecto }}" action="{{ route('editar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                        <a href="{{ route('eliminar_proyecto', [$proyecto->cod_proyecto]) }}" class="text-red-500 hover:text-red-700 ml-2" onclick="event.preventDefault(); document.getElementById('eliminar-form-{{ $proyecto->cod_proyecto}}').submit();">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                        <form id="eliminar-form-{{ $proyecto->cod_proyecto }}" action="{{ route('eliminar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST" style="display: none;">
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

    <div id="modal-container" class="hidden fixed inset-0 overflow-y-auto flex justify-center items-center z-50 bg-gray-900 bg-opacity-50">
        <div class="modal-content-wrapper bg-gray-700 text-white p-4 rounded z-10 relative">
            <h2 class="font-semibold text-xl mb-4 text-center">Detalles del Proyecto</h2>
                    <table class="table-auto w-full">
                        <tbody>
                            <tr>
                                <td class="text-white"><strong>Código:</strong></td>
                                <td class="text-white" id="proyecto-cod-proyecto"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Título:</strong></td>
                                <td class="text-white" id="proyecto-titulo"></td>
                            </tr>

                            <tr>
                                <td class="text-white"><strong>Código del semillero:</strong></td>
                                <td class="text-white" id="proyecto-cod-semillero"></td>
                            </tr>

                            <tr>
                                <td class="text-white"><strong>Tipo:</strong></td>
                                <td class="text-white" id="proyecto-tipo-proyecto"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Estado:</strong></td>
                                <td class="text-white" id="proyecto-estado"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Fecha de Inicio:</strong></td>
                                <td class="text-white" id="proyecto-fecha-inicio"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Fecha de finalización:</strong></td>
                                <td class="text-white"  id="proyecto-fecha-finalizacion"></td>
                            </tr>

                            <tr>
                                <td class="text-white"><strong>Propuesta:</strong></td>
                                <td class="text-white" id="proyecto-propuesta"></td>
                            </tr>
                            <tr>
                                <td class="text-white"><strong>Proyecto Final:</strong></td>
                                <td class="text-white" id="proyecto-proyecto-final"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="flex justify-center mt-4">
                        <button id="close-modal" class="px-4 py-2 bg-blue-500 text-black rounded">Cerrar</button>
                    </div>
        </div>
    </div>

    <div id="participantes-modal-container" class="hidden fixed inset-0 overflow-y-auto flex justify-center items-center z-50 bg-gray-900 bg-opacity-50">
        <div class="modal-content-wrapper bg-gray-700 text-white p-4 rounded z-10 relative">
            <ul id="contenido-modal">
            </ul>
            <div class="flex justify-center mt-4">
                <button id="close-participantes-modal" class="px-4 py-2 bg-blue-500 text-black rounded">Cerrar</button>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('registro.proyecto') }}" class="px-4 py-2 bg-green-500 text-black rounded">Registrar otro Proyecto</a>
    </div>

    <script>
        // Función para abrir el modal cuando se hace clic en el botón del ojo
        function openModal(proyecto) {
            document.getElementById('proyecto-cod-proyecto').innerText = proyecto.cod_proyecto;
            document.getElementById('proyecto-titulo').innerText = proyecto.titulo;
            document.getElementById('proyecto-cod-semillero').innerText = proyecto.cod_semillero;
            document.getElementById('proyecto-tipo-proyecto').innerText = proyecto.tipo_proyecto;
            document.getElementById('proyecto-estado').innerText = proyecto.estado;
            document.getElementById('proyecto-fecha-inicio').innerText = proyecto.fecha_inicio;
            document.getElementById('proyecto-fecha-finalizacion').innerText = proyecto.fecha_finalizacion;
            document.getElementById('proyecto-propuesta').innerText = proyecto.propuesta;
            document.getElementById('proyecto-proyecto-final').innerText = proyecto.proyecto_final;

            document.getElementById('modal-container').classList.remove('hidden');
        }

        function openParticipantesModal(participantes) {
            if(participantes){
                var modalContent = `
                <h2 class="font-semibold text-xl mb-4 text-center">Participantes</h2>
                <ul>
                    ${participantes.map(participante => `<li class="text-xl mb-4 text-center">${participante}</li>`).join('')}
                </ul>`;
            }else{
                var modalContent = `
                <h2 class="font-semibold text-xl mb-4 text-center">No hay participantes en este proyecto</h2>`;
            }
            document.getElementById('contenido-modal').innerHTML  = modalContent
            document.getElementById('participantes-modal-container').classList.remove('hidden');
        }

        // Función para cerrar el modal cuando se hace clic en el botón de cerrar
        function closeModal() {
        document.getElementById('modal-container').classList.add('hidden');
        }

        function closeParticipantesModal() {
            document.getElementById('participantes-modal-container').classList.add('hidden');
        }

        // Escuchar el clic en el botón de cerrar y cerrar el modal
        document.getElementById('close-modal').addEventListener('click', function() {
            closeModal();
        });

        document.getElementById('close-participantes-modal').addEventListener('click', function() {
            closeParticipantesModal();
        });

        // Escuchar el clic en el botón del ojo y abrir el modal
        document.querySelectorAll('.view-proyecto').forEach(function(button) {
            button.addEventListener('click', function() {

                var proyectoCodigo = button.getAttribute('data-cod-proyecto');
                var proyectoTitulo= button.getAttribute('data-titulo');
                var proyectoCodSemillero = button.getAttribute('data-cod-semillero');
                var proyectoTipoProyecto = button.getAttribute('data-tipo-proyecto');
                var proyectoEstado = button.getAttribute('data-estado');
                var proyectoFechaInicio = button.getAttribute('data-fecha-inicio');
                var proyectoFechaFin = button.getAttribute('data-fecha-finalizacion');
                var proyectoPropuesta = button.getAttribute('data-propuesta');
                var proyectoProyectoFinal = button.getAttribute('data-proyecto-final');


                var proyectoData = {
                    cod_proyecto: proyectoCodigo,
                    titulo: proyectoTitulo,
                    cod_semillero: proyectoCodSemillero,
                    tipo_proyecto: proyectoTipoProyecto,
                    estado: proyectoEstado,
                    fecha_inicio: proyectoFechaInicio,
                    fecha_finalizacion: proyectoFechaFin,
                    propuesta: proyectoPropuesta,
                    proyecto_final:proyectoProyectoFinal,
                };
                openModal(proyectoData);
            });
        });

        document.querySelectorAll('.view-participantes').forEach(function(button) {
            button.addEventListener('click', function() {
                var proyectosData = button.getAttribute('data-proyecto-data');
                var codProyecto = button.getAttribute('data-cod-proyecto');
                var participantes

                if (proyectosData && codProyecto) {
                    proyectosData = JSON.parse(proyectosData);

                    if (proyectosData.hasOwnProperty(codProyecto)) {
                        var proyectoData = proyectosData[codProyecto];
                        participantes = proyectoData.participantes;
                    }
                }
                openParticipantesModal(participantes);
            });
        });

    </script>

</x-guest-layout>
