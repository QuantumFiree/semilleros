@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-4xl font-bold text-center text-black mb-6">Editar Proyecto</h1>
                @isset($proyecto)
                    <form action="{{ route('actualizar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label for="cod_proyecto" class="block text-sm font-medium text-gray-700">Código de Proyecto</label>
                                <input id="cod_proyecto" type="text" name="cod_proyecto" :value="$proyecto->cod_proyecto" required autofocus class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-2">
                                <x-label for="titulo" value="{{ __('Título del Proyecto') }}" />
                                <x-input id="titulo" class="block mt-1 w-full border border-green-500" type="text" name="titulo" :value="$proyecto->titulo" required autofocus />
                            </div>

                            <div class="col-span-2">
                                <x-label for="cod_semillero" value="{{ __('Código del Semillero') }}" />
                                <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="text" name="cod_semillero" :value="$proyecto->cod_semillero" required />
                            </div>

                            <div class="col-span-2">
                                <x-label for="tipo_proyecto" value="{{ __('Tipo de Proyecto') }}" />
                                <x-input id="tipo_proyecto" class="block mt-1 w-full border border-green-500" type="text" name="tipo_proyecto" :value="$proyecto->tipo_proyecto" />
                            </div>

                            <div class="col-span-2">
                                <x-label for="estado" value="{{ __('Estado del Proyecto') }}" />
                                <x-input id="estado" class="block mt-1 w-full border border-green-500" type="text" name="estado" :value="$proyecto->estado" required />
                            </div>

                            <div class="col-span-2">
                                <x-label for="fecha_inicio" value="{{ __('Fecha de Inicio') }}" />
                                <x-input id="fecha_inicio" class="block mt-1 w-full border border-green-500" type="date" name="fecha_inicio" :value="$proyecto->fecha_inicio" />
                            </div>

                            <div class="col-span-2">
                                <x-label for="fecha_finalizacion" value="{{ __('Fecha de Finalización') }}" />
                                <x-input id="fecha_finalizacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_finalizacion" :value="$proyecto->fecha_finalizacion" />
                            </div>

                            <div class="col-span-2">
                                <x-label for="propuesta" value="{{ __('Propuesta') }}" />
                                <x-input id="propuesta" class="block mt-1 w-full border border-green-500" type="text" name="propuesta" :value="$proyecto->propuesta" />
                            </div>

                            <div class="col-span-2">
                                <x-label for="proyecto_final" value="{{ __('Proyecto Final') }}" />
                                <x-input id="proyecto_final" class="block mt-1 w-full border border-green-500" type="text" name="proyecto_final" :value="$proyecto->proyecto_final" />
                            </div>

                            <div class="col-span-2 mt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                    
                @else
                    <p>El proyecto no existe.</p>
                @endisset
            </div>
        </div>
    </div>
@endsection
