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

    <div class="container">
        <div class="container-form">
            <form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST"
                action="{{ route('actualizar_proyecto', ['cod_proyecto' => $proyecto->cod_proyecto]) }}">
                @csrf
                <div class="three-columns-grid">
                    <div class="column">
                        <div>

                            <x-label for="titulo" value="{{ __('Título del Proyecto') }}" />
                            <x-input id="titulo"
                                class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500"
                                type="text" name="titulo" value="{{ $proyecto->titulo }}" required autofocus />
                        </div>
                        <div class="sm:col-span-3">
                            <label for="cod_semillero"
                                class="block text-sm font-medium leading-6 text-gray-900">Semillero</label>
                            <div class="mt-2">
                                <select id="cod_semillero" name="cod_semillero" autocomplete="cod_semillero"
                                    class="block w-full rounded-md border-2 border-green-500 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    <option select class="hidden" value="{{ $proyecto->cod_semillero }}">{{ $proyecto->nombre }}</option>
                                    @foreach ($semilleros as $semillero)
                                        <option value="{{ $semillero->cod_semillero }}">{{ $semillero->nombre }}
                                        </option>
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
                                    <option select class="hidden" value="{{ $proyecto->tipo_proyecto }}">{{ $proyecto->tipo_proyecto }}</option>
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
                                    <option select class="hidden" value="{{ $proyecto->estado }}">{{ $proyecto->estado }}</option>
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
                            <x-input id="fecha_inicio"
                                class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500"
                                type="date" name="fecha_inicio" value="{{$proyecto->fecha_inicio}}"/>
                        </div>
                        <div>
                            <x-label for="fecha_finalizacion" value="{{ __('Fecha de Finalización') }}" />
                            <x-input id="fecha_finalizacion"
                                class="shadow disabled:opacity-50 block mt-1 w-full border-2 border-green-500"
                                type="date" name="fecha_finalizacion" value="{{$proyecto->fecha_finalizacion}}"/>
                        </div>
                        <div class="shadow bg-gray-300 rounded mt-11 flex px-3 pt-2">
                            <x-label class="my-1 font-medium" for="acuerdo_nombramiento" value="{{ __('Propuesta de proyecto') }}" />

                            <x-button type="button" class="ml-4 mb-2 bg-green-500" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </x-button>
                            <x-button type="button" class="ml-4 mb-2 bg-red-700" data-bs-toggle="modal" data-bs-target="#actualizarModal" id="acuerdoNombramientoAct">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                </svg>

                            </x-button>
                        </div>
                        <div class="shadow bg-gray-300 rounded mt-11 flex px-3 pt-2">
                            <x-label class="w-1/2 my-1 font-medium" for="acuerdo_nombramiento" value="{{ __('Proyecto final') }}" />

                            <div class="justify-center flex">
                                <x-button type="button" class="ml-2 mb-2 bg-green-500" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </x-button>
                                <x-button type="button" class="ml-4 mb-2 bg-red-700" data-bs-toggle="modal" data-bs-target="#actualizarModal2" id="acuerdoNombramientoAct">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                                    </svg>

                                </x-button>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Propuesta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ asset('storage/' . $proyecto->propuesta) }}" type="application/pdf" width="100%" height="400px">
                                    </div>
                                    <div class="modal-footer">
                                        <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                            {{ __('Cerrar') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="actualizarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar propuesta</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <x-label for="acuerdo_nombramiento" value="{{ __('Acuerdo Nombramiento (PDF)') }}" />
                                            <x-input id="acuerdo_nombramiento" class="disabled:opacity-50 block mt-1 w-full" type="file" name="acuerdo_nombramiento" :value="old('acuerdo_nombramiento')" accept="application/pdf" placeholder="hola" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                            {{ __('Confirmar') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Proyecto final</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <embed src="{{ asset('storage/' . $proyecto->proyecto_final) }}" type="application/pdf" width="100%" height="400px">
                                    </div>
                                    <div class="modal-footer">
                                        <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                            {{ __('Cerrar') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="actualizarModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Proyecto final</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <x-label for="acuerdo_nombramiento" value="{{ __('Acuerdo Nombramiento (PDF)') }}" />
                                            <x-input id="acuerdo_nombramiento" class="disabled:opacity-50 block mt-1 w-full" type="file" name="acuerdo_nombramiento" :value="old('acuerdo_nombramiento')" accept="application/pdf" placeholder="hola" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <x-button type="button" class="ml-4" data-bs-dismiss="modal">
                                            {{ __('Confirmar') }}
                                        </x-button>
                                    </div>
                                </div>
                            </div>
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
