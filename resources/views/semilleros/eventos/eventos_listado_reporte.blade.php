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



    i {
        font-size: 1rem !important;
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
          
        
          padding: 15px;
          border-radius: 15px; 
    }


</style>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<x-app-layout>
    <x-slot name="header">
        <div>
            
        <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Reporte de eventos') }}
        </h2>
          
        </div>
    </x-slot>
    <div class="min-h-xl flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class=" w-full sm:max-w-4xl px-4 pt-3 pb-8 mt-3 shadow-md overflow-hidden sm:rounded-lg bg-gray-300">
            <div class="container-list-custom flex items-baseline justify-center bg-gray-300 overflow-auto">
                <div class="col-span-12">
                    <div class="overflow-auto lg:overflow-visible ">
                       
                        @foreach($eventos as $evento)


                        <div class="caja">
                            
                                <legend class="px-5 py-2 text-center bg-[#00923f]  text-white"><b><h5>Nombre del Evento: {{ $evento->nombre }}</h5></b></legend>
                                
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Código del Evento:</strong> {{ $evento->cod_evento }}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Descripción del Evento:</strong> {{ $evento->descripcion }}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Fecha de Inicio del Evento:</strong> {{ $evento->fecha_inicio }}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Fecha de Finalización del Evento:</strong> {{ $evento->fecha_fin }}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Lugar del Evento:</strong> {{ $evento->lugar }}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Tipo de Evento:</strong> {{ $evento->tipo}}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Modalidad de Evento:</strong> {{ $evento->modalidad}}</h5> <br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Clasificación del Evento:</strong> {{ $evento->clasificacion}}</h5><br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Observaciones del Evento:</strong> {{ $evento->observaciones}}</h5> <br>
                                <h5 class="bg-[#374151] text-white px-4 py-2 rounded text-center"><strong class="text-[#42d47d]">Código del semillero al que pertenece:</strong> {{ $evento->cod_semillero}}</h5> <br>
                           
                        </div> <br> <br>
                        @endforeach
                   
           
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('eventos.listado') }}" class="px-4 py-2 ml-5 bg-[#00923f] text-white rounded">Regresar</a>
        
    </div><br>
  
</x-guest-layout>