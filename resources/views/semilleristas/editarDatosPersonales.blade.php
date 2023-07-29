
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
    <div class="w-full sm:max-w-2xl px-4 py-6 shadow-md overflow-hidden sm:rounded-lg bg-gray-500">
        <form class="form-custom" id="formDatosPersonales" method="POST" action="{{route('perfilCoordinador')}}">
            @csrf
            <div class="three-columns-grid">
                <div class="column">
                    <div style="display:none">
                        <x-input id="cod_coordinador" type="text" name="cod_coordinador" :value="old('cod_coordinador')"  value="{{$coordinador->cod_coordinador}}"/>
                    </div>
                    <div>
                        <x-label for="nombres" value="{{ __('Nombres') }}" />
                        <x-input disabled id="nombres" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="nombres" :value="old('nombres')" autofocus autocomplete="nombres" value="{{$coordinador->nombres}}"/>
                    </div>

                    <div>
                        <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                        <x-input disabled id="apellidos" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="apellidos" :value="old('apellidos')"  autofocus autocomplete="apellidos" value="{{$coordinador->apellidos}}"/>
                    </div>

                    <div>
                        <x-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-input id="direccion" class="block mt-1 w-full border-2 border-green-500" type="text" name="direccion" :value="old('direccion')" value="{{$coordinador->direccion}}"/>
                    </div>

                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="telefono" class="block mt-1 w-full border-2 border-green-500" type="text" name="telefono" :value="old('telefono')" value="{{$coordinador->telefono}}"/>
                    </div>

                    <div style="display:none">
                        <x-label for="genero" value="{{ __('Genero') }}" />
                        <x-input id="genero" class="block mt-1 w-full border-2 border-green-500" type="text" name="genero" :value="old('genero')" value="{{$coordinador->genero}}"/>
                    </div>
                </div>
                <div class="column">
                    <div>
                        <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-input disabled id="fecha_nacimiento" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" value="{{$coordinador->fecha_nacimiento}}"/>
                    </div>
                    <div>
                        <x-label for="cod_docente" value="{{ __('Código Docente') }}" />
                        <x-input disabled id="cod_docente" class=" disabled:opacity-50 block mt-1 w-full border-2 border-green-500" type="text" name="cod_docente" :value="old('cod_docente')" value="{{$coordinador->cod_docente}}"/>
                    </div>

                    <div>
                        <x-label for="area_conocimiento" value="{{ __('Área de Conocimiento') }}" />
                        <x-input id="area_conocimiento" class="block mt-1 w-full border-2 border-green-500" type="text" name="area_conocimiento" :value="old('area_conocimiento')" value="{{$coordinador->area_conocimiento}}"/>
                    </div>

                    <div>
                        <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                        <x-input disabled id="fecha_vinculacion" class="disabled:opacity-50 block mt-1 w-full border-2 border-green-500 border-2" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" value="{{$coordinador->fecha_vinculacion}}"/>
                    </div>
                    <div style="margin-top:20px; display:none">
                        <x-label for="acuerdo_nombramiento" value="{{ __('Acuerdo Nombramiento (PDF)') }}" />
                        <x-input id="acuerdo_nombramiento" class="block mt-1 w-full" type="file" name="acuerdo_nombramiento" :value="old('acuerdo_nombramiento')" accept="application/pdf" placeholder="hola"/>
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
