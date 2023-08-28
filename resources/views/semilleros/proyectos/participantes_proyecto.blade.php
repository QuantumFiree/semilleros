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
                {{ __('Agregar participantes al proyecto') }}
            </h2>
            <h2 class="justify-self-end font-sans text-end font-extrabold text-2xl text-yellow-400 leading-tight">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <div class="container">
        <div class="container-form">
            <form enctype="multipart/form-data" class="form-custom" id="formDatosPersonales" method="POST"
                action="{{ route('participantes_proyecto.store') }}">
                @csrf
                <input type="input" name="cod_proyecto" value="{{ $cod_proyecto }}" style="display: none">
                <ul class="h-2/3 px-3 pb-3 overflow-y-auto text-sm text-gray-700 dark:text-gray-200"
                    aria-labelledby="dropdownSearchButton">
                    <li class="mt-1">
                        <div class="flex bg-gray-200 items-center p-2 rounded border-b-2 border-green-500">
                            <label for="checkbox-item-11"
                                class="
                                ml-2
                                text-sm
                                font-extrabold
                                text-green-600
                                rounded
                                dark:text-gray-300
                                w-1/6
                                border-r-2
                                border-green-500
                                ">
                                {{ 'Codigo' }}
                            </label>
                            <label for="checkbox-item-11"
                                class="
                                text-sm
                                font-bold
                                text-green-600
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                border-r-2
                                border-green-500
                                ">
                                {{ 'Nombre completo' }}
                            </label>
                            <label for="checkbox-item-11"
                                class="
                                text-sm
                                font-extrabold
                                text-green-600
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                border-r-2
                                border-green-500
                                ">
                                {{ 'Programa' }}
                            </label>
                            <label for="checkbox-item-11"
                                class="
                                text-sm
                                font-extrabold
                                text-green-600
                                text-center
                                rounded
                                dark:text-gray-300
                                w-1/6
                                ">
                                {{ 'Accion' }}
                            </label>

                        </div>
                    </li>
                    @if (isset($participantes_actuales[0]))
                        @foreach ($participantes_actuales as $participante_actual)
                            <li class="mt-1">
                                <div class="flex bg-gray-400 items-center p-2 rounded hover:bg-gray-500">
                                    <label for="checkbox-item-11"
                                        class="
                                ml-2
                                text-sm
                                font-extrabold
                                text-gray-200
                                rounded
                                dark:text-gray-300
                                w-1/6
                                ">
                                        {{ $participante_actual->cod_semillerista }}
                                    </label>
                                    <label for="checkbox-item-11"
                                        class="
                                text-sm
                                font-normal
                                text-gray-800
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                ">
                                        {{ $participante_actual->nombres }}
                                        {{ $participante_actual->apellidos }}
                                    </label>
                                    <label for="checkbox-item-11"
                                        class="
                                text-sm
                                font-normal
                                text-gray-800
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                ">
                                        {{ $participante_actual->nombres }}
                                    </label>
                                    <div class="w-1/6 flex justify-center">
                                        <input checked id="{{ $participante_actual->cod_semillerista }}"
                                            type="checkbox" value="{{ $participante_actual->cod_semillerista }}"
                                            name="cod_semilleristas[]"
                                            class="
                                    h-4
                                    text-green-400
                                    bg-gray-100
                                    border-gray-300
                                    rounded
                                    focus:ring-green-600
                                    dark:focus:ring-blue-600
                                    dark:ring-offset-gray-700
                                    dark:focus:ring-offset-gray-700
                                    focus:ring-2
                                    dark:bg-gray-600
                                    dark:border-gray-500
                                ">
                                    </div>

                                </div>
                            </li>
                        @endforeach
                        @php
                            $counterParticipantes = 0;
                        @endphp

                        @foreach ($semilleristas as $semillerista)
                            @if ($participantes_actuales[$counterParticipantes]->cod_semillerista != $semillerista->cod_semillerista)
                                <li class="mt-1">
                                    <div class="flex bg-gray-400 items-center p-2 rounded hover:bg-gray-500">
                                        <label for="checkbox-item-11"
                                            class="
                                        ml-2
                                        text-sm
                                        font-extrabold
                                        text-gray-200
                                        rounded
                                        dark:text-gray-300
                                        w-1/6
                                        ">
                                            {{ $semillerista->cod_semillerista }}
                                        </label>
                                        <label for="checkbox-item-11"
                                            class="
                                        text-sm
                                        font-normal
                                        text-gray-800
                                        text-center
                                        rounded
                                        dark:text-gray-300
                                        w-2/6
                                        ">
                                            {{ $semillerista->nombres }}
                                            {{ $semillerista->apellidos }}
                                        </label>
                                        <label for="checkbox-item-11"
                                            class="
                                        text-sm
                                        font-normal
                                        text-gray-800
                                        text-center
                                        rounded
                                        dark:text-gray-300
                                        w-2/6
                                        ">
                                            {{ $semillerista->nombres }}
                                        </label>
                                        <div class="w-1/6 flex justify-center">
                                            <input id="{{ $semillerista->cod_semillerista }}" type="checkbox"
                                                value="{{ $semillerista->cod_semillerista }}"
                                                name="cod_semilleristas[]"
                                                class="
                                            h-4
                                            text-green-400
                                            bg-gray-100
                                            border-gray-300
                                            rounded
                                            focus:ring-green-600
                                            dark:focus:ring-blue-600
                                            dark:ring-offset-gray-700
                                            dark:focus:ring-offset-gray-700
                                            focus:ring-2
                                            dark:bg-gray-600
                                            dark:border-gray-500
                                        ">
                                        </div>

                                    </div>
                                </li>
                            @else
                                @php

                                    if($counterParticipantes < count($participantes_actuales)-1){
                                        $counterParticipantes++;
                                    }
                                @endphp
                            @endif
                        @endforeach
                    @else
                        @foreach ($semilleristas as $semillerista)
                            <li class="mt-1">
                                <div class="flex bg-gray-400 items-center p-2 rounded hover:bg-gray-500">
                                    <label for="checkbox-item-11"
                                        class="
                                ml-2
                                text-sm
                                font-extrabold
                                text-gray-200
                                rounded
                                dark:text-gray-300
                                w-1/6
                                ">
                                        {{ $semillerista->cod_semillerista }}
                                    </label>
                                    <label for="checkbox-item-11"
                                        class="
                                text-sm
                                font-normal
                                text-gray-800
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                ">
                                        {{ $semillerista->nombres }}
                                        {{ $semillerista->apellidos }}
                                    </label>
                                    <label for="checkbox-item-11"
                                        class="
                                text-sm
                                font-normal
                                text-gray-800
                                text-center
                                rounded
                                dark:text-gray-300
                                w-2/6
                                ">
                                        {{ $semillerista->nombres }}
                                    </label>
                                    <div class="w-1/6 flex justify-center">
                                        <input id="{{ $semillerista->cod_semillerista }}" type="checkbox"
                                            value="{{ $semillerista->cod_semillerista }}" name="cod_semilleristas[]"
                                            class="
                                    h-4
                                    text-green-400
                                    bg-gray-100
                                    border-gray-300
                                    rounded
                                    focus:ring-green-600
                                    dark:focus:ring-blue-600
                                    dark:ring-offset-gray-700
                                    dark:focus:ring-offset-gray-700
                                    focus:ring-2
                                    dark:bg-gray-600
                                    dark:border-gray-500
                                ">
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    @endif


                </ul>
                <div class="flex items-center justify-end mt-2">
                    <x-button id="buttonRegistro" type="submit" class="">
                        {{ __('Aceptar cambios') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            const maxChecked = 5; // Cambia esto al número máximo de checkboxes que deseas permitir seleccionar

            $('input[type="checkbox"]').on('change', function() {
                let checkedCount = $('input[type="checkbox"]:checked').length;
                if (checkedCount > maxChecked) {
                    $(this).prop('checked', false);
                }
            });
        });
    </script>

</x-app-layout>
