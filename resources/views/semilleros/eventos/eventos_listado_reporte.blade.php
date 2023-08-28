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

    /
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
   
    legend{
        border: 1px solid rgba(238, 224, 237, 0.384);
        padding: 10px;
        text-align: center;
        background-color: rgba(245, 248, 248, 0.788);
        border-radius: 8px;
           
    }
    .caja{
          
          background-color: #33FFC9;
          padding: 15px;
          border-radius: 15px; 
    }


</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-800 text-right leading-tight">
                
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
                       
                       <br> <h2 class="text-blue-800 text-center "><FONT SIZE=6><strong>REPORTE DE EVENTOS</strong></font></h2><br>
                        @foreach($eventos as $evento)


                        <div class="caja">
                            
                                <legend class="px-5 py-2 border text-center"><b><h5>Nombre del Evento: {{ $evento->nombre }}</h5></b></legend>
                                
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Código del Evento:</strong> {{ $evento->cod_evento }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Descripción del Evento:</strong> {{ $evento->descripcion }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Fecha de Inicio del Evento:</strong> {{ $evento->fecha_inicio }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Fecha de Finalización del Evento:</strong> {{ $evento->fecha_fin }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Lugar del Evento:</strong> {{ $evento->lugar }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Tipo de Evento:</strong> {{ $evento->tipo}}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Modalidad de Evento:</strong> {{ $evento->modalidad}}</h5> <br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Clasificación del Evento:</strong> {{ $evento->clasificacion}}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Observaciones del Evento:</strong> {{ $evento->observaciones}}</h5> <br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Código del semillero al que pertenece:</strong> {{ $evento->cod_semillero}}</h5> <br>
                           
                        </div> <br> <br>
                        @endforeach
                   
           
                    
                     </div>
                </div>
            </div>
        </div>
    </div>
 
    <div class="flex justify-center mt-4">
        <a href="{{ route('eventos.listado') }}" class="px-4 py-2 bg-green-500 text-black rounded">Regresar</a>
        
    </div><br>
    
   
</x-guest-layout>