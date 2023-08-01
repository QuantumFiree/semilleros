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
</style>
<x-app-layout>
    <x-slot name="header">
    <div class="columns-2">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Proceso de registro') }}
            </h2>
            <h2 class="font-bold text-xl text-red-600 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <div class="container">
    <div class="container-form">
        <form class="form-custom" id="formDatosPersonales" method="POST" action="{{route('registroSemillerista')}}">
            @csrf
            <div class="three-columns-grid">
                <div class="column">
                    <div style="display:none">
                        <x-input id="cod_user" type="text" name="cod_user" value="{{auth()->user()->id}}" required />
                    </div>
                    <div>
                        <x-label for="nombres" value="{{ __('Nombres') }}" />
                        <x-input id="nombres" class="block mt-1 w-full border border-green-500" type="text" name="nombres" :value="old('nombres')" required autofocus autocomplete="nombres" />
                    </div>

                    <div>
                        <x-label for="apellidos" value="{{ __('Apellidos') }}" />
                        <x-input id="apellidos" class="block mt-1 w-full border border-green-500" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                    </div>

                    <div>
                        <x-label for="identificacion" value="{{ __('Identificación') }}" />
                        <x-input id="identificacion" class="block mt-1 w-full border border-green-500" type="text" name="identificacion" :value="old('identificacion')" required />
                    </div>

                    <div>
                        <x-label for="direccion" value="{{ __('Dirección') }}" />
                        <x-input id="direccion" class="block mt-1 w-full border border-green-500" type="text" name="direccion" :value="old('direccion')" required />
                    </div>

                    <div>
                        <x-label for="telefono" value="{{ __('Teléfono') }}" />
                        <x-input id="telefono" class="block mt-1 w-full border border-green-500" type="text" name="telefono" :value="old('telefono')" required />
                    </div>

                    <div>
                        <x-label for="genero" value="{{ __('Genero') }}" />
                        <x-input id="genero" class="block mt-1 w-full border border-green-500" type="text" name="genero" :value="old('genero')" required />
                    </div>
                </div>
                <div class="column">
                    <div>
                        <x-label for="fecha_nacimiento" value="{{ __('Fecha de Nacimiento') }}" />
                        <x-input id="fecha_nacimiento" class="block mt-1 w-full border border-green-500" type="date" name="fecha_nacimiento" :value="old('fecha_nacimiento')" required />
                    </div>
                    <div>
                        <x-label for="cod_programa_academico" value="{{ __('Código Programa Académico') }}" />
                        <x-input id="cod_programa_ac*ademico" class="block mt-1 w-full border border-green-500" type="text" name="cod_programa_academico" :value="old('cod_programa_academico')" required />
                    </div>
                    <div>
                        <x-label for="cod_estudiantil" value="{{ __('Codigo Estudiante') }}" />
                        <x-input id="cod_estudiantil" class="block mt-1 w-full border border-green-500" type="text" name="cod_estudiantil" :value="old('cod_estudiantil')" required />
                    </div>

                    <div>
                        <x-label for="semestre" value="{{ __('Semestre') }}" />
                        <x-input id="semestre" class="block mt-1 w-full border border-green-500" type="text" name="semestre" :value="old('semestre')" required />
                    </div>

                    <div>
                        <x-label for="fecha_vinculacion" value="{{ __('Fecha de Vinculación') }}" />
                        <x-input id="fecha_vinculacion" class="block mt-1 w-full border border-green-500" type="date" name="fecha_vinculacion" :value="old('fecha_vinculacion')" />
                    </div>
                    <div>
                        <x-label for="cod_semillero" value="{{ __('Codigo Semillero') }}" />
                        <x-input id="cod_semillero" class="block mt-1 w-full border border-green-500" type="text" name="cod_semillero" :value="old('cod_semillero')" required />
                    </div>
                    <div style="margin-top:20px">
                        <x-label for="reporte_matricula" value="{{ __('Reporte de Matricula (PDF)') }}" />
                        <x-input id="reporte_matricula" class="block mt-1 w-full" type="file" name="reporte_matricula" :value="old('reporte_matricula')" accept="application/pdf" />
                    </div>
                    <div class="flex items-center justify-end mt-4">
            <x-button id="buttonRegistro" class="ml-4">
                {{ __('Registrar') }}
            </x-button>
        </div>
                </div>
            </div>
        </form>
    </div>
</div>

    
</x-app-layout>