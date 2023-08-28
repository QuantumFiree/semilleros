<style>
.three-columns-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 50px;
    /* Espacio entre columnas */
}

.container-form {
    width: 800px;
    margin: auto;
    margin-top: 30px;
}

.form-custom label {
    font-size: 15px;
    margin-bottom: 10px;
    margin-top: 20px;
}

/* Estilo para ocultar las flechas de incremento y decremento */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
</style>
<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Proceso de registro') }}
            </h2>
            <h2 class="justify-self-end font-sans text-end font-extrabold text-2xl text-yellow-400 leading-tight">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>
    <div class=" flex flex-col w-full items-center " >
        <div class=" mt-6 px-6 py-4 shadow-2xl overflow-hidden sm:rounded-lg" style="background-color: #bcd9c8">
            <x-slot name="logo">
            </x-slot>

    <div class="container">
        <div class="container-form">
            <form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST"
                action="{{ route('registro.proyecto') }}">
                @csrf
                <div class="three-columns-grid">
                    <div class="column">
                        <div>

                            <x-label for="titulo" value="{{ __('Título del Proyecto') }}" />
                            <x-input id="titulo" class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text"
                                name="titulo" required autofocus />
                        </div>
                        <div class="sm:col-span-3">
                            <label for="cod_semillero" class="block text-sm font-medium leading-6 text-gray-900">Semillero</label>
                            <div class="mt-2">
                                <select id="cod_semillero" name="cod_semillero" autocomplete="cod_semillero"
                                    class="block w-full rounded-md border-2 border-green-500 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @foreach ($semilleros as $semillero)
                                    <option value="{{$semillero->cod_semillero}}">{{$semillero->nombre}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="genero" class="block text-sm font-medium leading-6 text-gray-900">Tipo de
                                proyecto</label>
                            <div class="mt-2">
                                <select id="tipo_proyecto" name="tipo_proyecto" autocomplete="tipo de proyecto"
                                    class="block w-full rounded-md border-2 border-green-500 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option value="Proyecto de investigacion">Opciones...</option>
                                    <option value="Proyecto de investigacion">Proyecto de investigacion</option>
                                    <option value="Proyecto de innovacion y desarrollo">Proyecto de innovacion y
                                        desarrollo</option>
                                    <option value="Proyecto de emprendimiento">Proyecto de emprendimiento</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-3">
                            <label for="estado" class="block text-sm font-medium leading-6 text-gray-900">Estado del
                                proyecto</label>
                            <div class="mt-2">
                                <select id="estado" name="estado" autocomplete="estado"
                                    class="block w-full rounded-md border-2 border-green-500 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option class="hidden">Opciones...</option>
                                    <option value="Propuesta">Propuesta</option>
                                    <option value="En curso">En curso</option>
                                    <option value="Inactivo">Inactivo</option>
                                    <option value="Terminado">Terminado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div>
                            <x-label for="fecha_inicio" value="{{ __('Fecha de Inicio') }}" />
                            <x-input id="fecha_inicio" class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date"
                                name="fecha_inicio" />
                        </div>
                        <div>
                            <x-label for="fecha_finalizacion" value="{{ __('Fecha de Finalización') }}" />
                            <x-input id="fecha_finalizacion" class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500"
                                type="date" name="fecha_finalizacion" />
                        </div>
                        <div>
                            <x-label for="propuesta" value="{{ __('Propuesta') }}" />
                            <x-input id="propuesta" class="block mt-1 w-full border border-green-500" type="file"
                                name="propuesta" />
                        </div>

                        <div>
                            <x-label for="proyecto_final" value="{{ __('Proyecto Final') }}" />
                            <x-input id="proyecto_final" class="block mt-1 w-full border border-green-500" type="file"
                                name="proyecto_final" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button id="buttonRegistro" type="submit" class="ml-4">
                                {{ __('Registrar') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
