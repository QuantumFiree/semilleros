<x-app-layout>
    <x-slot name="header">
    <div>
        <h2 class="font-semibold text-xl  text-left leading-tight text-white">
            {{ __('Registro de Presentacion') }}
        </h2>
    </div>
    </x-slot>
    <div class=" flex flex-col w-full items-center ">
        <div class="mt-6 px-6 py-4 shadow-2xl overflow-hidden sm:rounded-lg" style="background-color: #bcd9c8">
            <h2 class="text-2xl font-semibold mb-4 text-center">Crear Presentación de Proyecto</h2>
            <form action="{{ route('guardar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                        <label for="participacion" class="block text-sm font-medium text-gray-700">Participación:</label>
                        <input type="text" name="participacion" id="participacion" class="mt-1 p-2 border border-green-500 rounded-md w-full focus:border-green-700" required>
                <div class="mb-4">
                    <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación:</label>
                    <input type="number" step="any" name="calificacion" id="calificacion" class="mt-1 p-2 border rounded-md w-full" placeholder="#" required>
                </div>
                <p>Participantes:</p><br>
                @foreach($participantes as $participante)
                    <div class="mb-3 ml-4">

                        <input class="block form-check-input" type="checkbox" id="participante_{{ $participante->cod_semillerista }}" name="participantes[]" value="{{ $participante->cod_semillerista }}" >
                        <label class="form-check-label" for="participante_{{ $participante->cod_semillerista }}">
                            {{ $participante->nombres}}
                        </label>
                    </div>
                @endforeach
                <div class="mb-4">
                    <label for="certificacion" class="block text-sm font-medium text-gray-700">Certificación:</label>
                    <input type="file" name="certificacion" id="certificacion" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
                <div class="mb-4">
                    <label for="evidencias" class="block text-sm font-medium text-gray-700">Evidencias:</label>
                    <input type="file" name="evidencias" id="evidencias" class="mt-1 p-2 border rounded-md w-full" required>
                </div>
                <div class="mb-4">
                    <label for="cod_evento" class="block text-sm font-medium text-gray-700">Evento:</label>
                    <select name="cod_evento" id="cod_evento" class="mt-1 p-2 border rounded-md w-full" required>
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->cod_evento }}">{{ $evento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4" >
                    <h1><strong>Proyecto: </strong>{{ $proyecto->titulo }}</h1>
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button type="submit" >
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
