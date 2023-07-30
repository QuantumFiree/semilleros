@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-4xl font-bold text-center text-black mb-6">Editar Semillero</h1>
                @if($semillero)
                    <form action="{{ route('actualizar_semillero', ['id' => $semillero->cod_semillero]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                            <div>
                                <x-label for="nombre" value="{{ __('Nombre del Semillero') }}" />
                                <x-input id="nombre" class="block mt-1 w-full border border-green-500" type="text" name="nombre" :value="$semillero->nombre" required autofocus />
                            </div>
                            <div>
                                <x-label for="correo" value="{{ __('Correo Electrónico') }}" />
                                <x-input id="correo" class="block mt-1 w-full border border-green-500" type="email" name="correo" :value="$semillero->correo" required />
                            </div>

                            <div>
                                <x-label for="descripcion" value="{{ __('Descripción') }}" />
                                <x-input id="descripcion" class="block mt-1 w-full border border-green-500" type="text" name="descripcion" :value="$semillero->descripcion" required />
                            </div>

                            <div>
                                <x-label for="mision" value="{{ __('Misión') }}" />
                                <x-input id="mision" class="block mt-1 w-full border border-green-500" type="text" name="mision" :value="$semillero->mision" required />
                            </div>

                            <div>
                                <x-label for="vision" value="{{ __('Visión') }}" />
                                <x-input id="vision" class="block mt-1 w-full border border-green-500" type="text" name="vision" :value="$semillero->vision" required />
                            </div>

                            <div>
                                <x-label for="valores" value="{{ __('Valores') }}" />
                                <x-input id="valores" class="block mt-1 w-full border border-green-500" type="text" name="valores" :value="$semillero->valores" required />
                            </div>

                            <div>
                                <x-label for="objetivo" value="{{ __('Objetivo') }}" />
                                <x-input id="objetivo" class="block mt-1 w-full border border-green-500" type="text" name="objetivo" :value="$semillero->objetivo" required />
                            </div>

                            <div class="column">
                                <div>
                                    <x-label for="lineas_investigacion" value="{{ __('Líneas de Investigación') }}" />
                                    <x-input id="lineas_investigacion" class="block mt-1 w-full border border-green-500" type="text" name="lineas_investigacion" :value="$semillero->lineas_investigacion" required />
                                </div>

                                <div>
                                    <x-label for="presentacion" value="{{ __('Presentación') }}" />
                                    <x-input id="presentacion" class="block mt-1 w-full border border-green-500" type="text" name="presentacion" :value="$semillero->presentacion" required />
                                </div>

                                <div>
                                    <x-label for="fecha_creacion" value="{{ __('Fecha de Creación') }}" />
                                    <x-input id="fecha_creacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_creacion" :value="$semillero->fecha_creacion" required />
                                </div>

                                <div>
                                    <x-label for="numero_resolucion" value="{{ __('Número de Resolución') }}" />
                                    <x-input id="numero_resolucion" class="block mt-1 w-full border border-green-500" type="text" name="numero_resolucion" :value="$semillero->numero_resolucion" required />
                                </div>

                                <div>
                                    <x-label for="logo" value="{{ __('Logo (PDF)') }}" />
                                    <x-input id="logo" class="block mt-1 w-full" type="file" name="logo" :value="$semillero->logo" required accept="application/pdf" />
                                </div>

                                <div>
                                    <x-label for="cod_coordinador" value="{{ __('Código de Coordinador Encargado') }}" />
                                    <x-input id="cod_coordinador" class="block mt-1 w-full border border-green-500" type="text" name="cod_coordinador" :value="$semillero->cod_coordinador" required />
                                </div>

                            </div>

                            <div class="mt-4">
                                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Guardar cambios</button>
                            </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
