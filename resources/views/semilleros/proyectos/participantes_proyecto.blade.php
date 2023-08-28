<x-app-layout>
    <x-slot name="header">
        <div >
            <h2 class="font-semibold text-xl text-white text-left leading-tight">
                {{ __('Registrar participantes a un proyecto') }}
            </h2>
        </div>
    </x-slot>
    <div class=" flex flex-col w-full items-center " >
        <div class="mt-6 px-6 py-4 shadow-2xl overflow-hidden sm:rounded-lg" style="background-color: #bcd9c8" >
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
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" >
                        {{ __('Registrar Participante') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
