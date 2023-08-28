<x-app-layout>
    <x-slot name="header">
        <div class="columns-2">
            <h2 class="font-semibold text-xl text-blue-800 text-right leading-tight">
                {{ __('Registrar participantes a un proyecto') }}
            </h2>
            <h2 class="font-bold text-xl text-green-400 leading-tight text-right">
                {{ __(auth()->user()->rol) }}
            </h2>
        </div>
    </x-slot>

    <x-slot name="logo">
    </x-slot>

    <form method="POST" action="{{ route('participantes_proyecto.store') }}" enctype="multipart/form-data" class="w-full max-w-sm mx-auto">
        @csrf

        <div class="form-field">
            <x-label for="cod_proyecto" value="{{ __('Selecciona un Proyecto') }}" />
            <select id="cod_proyecto" class="block mt-1 w-full border border-green-500" name="cod_proyecto" required>
                <option value="">Selecciona un proyecto</option>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->cod_proyecto }}">{{ $proyecto->titulo }}</option>
                @endforeach
            </select>
        </div><br>

        <div class="form-field">
            <x-label for="cod_semillerista" value="{{ __('Selecciona un Semillerista') }}" />
            <select id="cod_semillerista" class="block mt-1 w-full border border-green-500" name="cod_semillerista" required>
                <option value="">Selecciona un semillerista</option>
                @foreach ($semilleristas as $semillerista)
                    <option value="{{ $semillerista->cod_semillerista }}">{{ $semillerista->nombre }} {{ $semillerista->apellidos }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex items-center justify-center mt-4">
            <button type="submit" class="btn-register" style="background-color: #007BFF; color: white; width: auto;">
                {{ __('Registrar Participante') }}
            </button>
        </div>
    </form>
</x-app-layout>
