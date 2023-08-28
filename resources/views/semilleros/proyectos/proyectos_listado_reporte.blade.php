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
                       <br> <h2 class="text-blue-800 text-center "><FONT SIZE=6><strong>REPORTE DE PROYECTOS</strong></font></h2><br>
                        @foreach($proyectos as $proyecto)

                        <div class="caja">
                            
                                <legend class="px-5 py-2 border text-center"><b><h5>Título del Proyecto: {{ $proyecto->titulo }}</h5></b></legend>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Código del Proyecto:</strong> {{ $proyecto->cod_proyecto }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Código del Semillero:</strong> {{ $proyecto->cod_semillero }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Tipo de Proyecto:</strong> {{ $proyecto->tipo_proyecto}}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Estado del Proyecto:</strong> {{ $proyecto->estado}}</h5> <br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Fecha de Inicio del Proyecto:</strong> {{ $proyecto->fecha_inicio }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Fecha de Finalización del Proyecto:</strong> {{ $proyecto->fecha_finalizacion }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Propuesta:</strong> {{ $proyecto->propuesta }}</h5><br>
                                <h5 class="bg-gray-700 text-green-400 px-4 py-2 border text-center"><strong>Proyecto Final:</strong> {{ $proyecto->proyecto_final}}</h5><br>
                        </div> <br> <br>
                        @endforeach
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-4">
        <a href="{{ route('proyectos.listado') }}" class="px-4 py-2 bg-green-500 text-black rounded"> Regresar </a>
        
    </div><br>
 
</x-guest-layout>