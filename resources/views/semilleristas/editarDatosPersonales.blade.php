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
    }

    .form-custom label {
        font-size: 15px;
        margin-bottom: 10px;
        margin-top: 20px;
        color: white
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Actualizar informacion personal') }}
            </h2>
            <h2 class="font-bold text-xl text-red-600 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-2xl px-4 py-6 shadow-md overflow-hidden sm:rounded-lg bg-gray-400    border-2 border-green-500">
            <form class="form-custom" id="formDatosPersonales" method="POST" action="{{route('perfilSemillerista')}}">
                @csrf
                <div class="three-columns-grid">
                    <div class="column">
                        <div style="display:none">
                            <x-input id="cod_semillerista" type="text" name="cod_semillerista" :value="old('cod_semillerista')" value="{{$semillerista->cod_semillerista}}" />
                        </div>
                        <div>
                            <x-label for="nombres" value="{{ __('Nombres') }}" />
                            <x-input disabled id="nombres" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="nombres" :value="old('nombres')" autofocus autocomplete="nombres" value="{{$semillerista->nombres}}" />
                        </div>

                        <div>
                            <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                            <x-input disabled id="apellidos" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="apellidos" :value="old('apellidos')" autofocus autocomplete="apellidos" value="{{$semillerista->apellidos}}" />
                        </div>

                        <div>
                            <x-label for="direccion" value="{{ __('Dirección') }}" />
                            <x-input id="direccion" class="block mt-1 w-full border-2 border-green-500" type="text" name="direccion" :value="old('direccion')" value="{{$semillerista->direccion}}" />
                        </div>

                        <div>
                            <x-label for="telefono" value="{{ __('Teléfono') }}" />
                            <x-input id="telefono" class="block mt-1 w-full border-2 border-green-500" type="text" name="telefono" :value="old('telefono')" value="{{$semillerista->telefono}}" />
                        </div>

                        <div style="display:none">
                            <x-label for="genero" value="{{ __('Genero') }}" />
                            <x-input id="genero" class="block mt-1 w-full border-2 border-green-500" type="text" name="genero" :value="old('genero')" value="{{$semillerista->genero}}" />
                        </div>
                    </div>
                    <div class="column">
                        <div>
                            <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                            <x-input disabled id="fecha_nacimiento" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" value="{{$semillerista->fecha_nacimiento}}" />
                        </div>
                        <div>
                            <x-label for="cod_estudiantil" value="{{ __('Codigo estudiantil') }}" />
                            <x-input disabled id="cod_estudiantil" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="cod_estudiantil" :value="old('cod_estudiantil')" value="{{$semillerista->cod_estudiantil}}" />
                        </div>

                        <div>
                            <x-label for="semestre" value="{{ __('Semestre academico') }}" />
                            <x-input disabled id="semestre" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="semestre" :value="old('semestre')" value="{{$semillerista->semestre}}" />
                        </div>

                        <div>
                            <x-label for="cod_semillero" value="{{ __('Semillero') }}" />
                            <x-input disabled id="cod_semillero" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="cod_semillero" :value="old('cod_semillero')" value="{{$semillerista->cod_semillero}}" />
                        </div>

                        <div>
                            <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                            <x-input disabled id="fecha_vinculacion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500 border-2" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" value="{{$semillerista->fecha_vinculacion}}" />
                        </div>
                        <div style="margin-top:20px; display:none">
                            <x-label for="reporte_matricula" value="{{ __('Reporte de Matricula (PDF)') }}" />
                            <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" placeholder="hola" />
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-button id="buttonRegistro" class="ml-4">
                                {{ __('Actualizar') }}
                            </x-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</x-app-layout>
