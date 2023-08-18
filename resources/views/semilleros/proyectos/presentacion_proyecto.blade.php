<x-app-layout>
<div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold mb-4 text-center">Crear Presentación de Proyecto</h2>
            <form action="{{ route('guardar_proyecto') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                        <label for="participacion" class="block text-sm font-medium text-gray-700">Participación:</label>
                        <input type="text" name="participacion" id="participacion" class="mt-1 p-2 border border-green-500 rounded-md w-full focus:border-green-700">
                <div class="mb-4">
                    <label for="calificacion" class="block text-sm font-medium text-gray-700">Calificación:</label>
                    <input type="text" name="calificacion" id="calificacion" class="mt-1 p-2 border rounded-md w-full">
                </div>
                @foreach($participantes as $participante)
                    <div class="mb-3 ml-4">
                        <input class="block form-check-input" type="checkbox" id="participante_{{ $participante->cod_semillerista }}" name="participantes[]" value="{{ $participante->cod_semillerista }}">
                        <label class="form-check-label" for="participante_{{ $participante->cod_semillerista }}">
                            {{ $participante->nombres}}
                        </label>
                    </div>
                @endforeach
                <div class="mb-4">
                    <label for="certificacion" class="block text-sm font-medium text-gray-700">Certificación:</label>
                    <input type="file" name="certificacion" id="certificacion" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="evidencias" class="block text-sm font-medium text-gray-700">Evidencias:</label>
                    <input type="file" name="evidencias" id="evidencias" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <div class="mb-4">
                    <label for="cod_evento" class="block text-sm font-medium text-gray-700">Evento:</label>
                    <select name="cod_evento" id="cod_evento" class="mt-1 p-2 border rounded-md w-full">
                        @foreach ($eventos as $evento)
                            <option value="{{ $evento->cod_evento }}">{{ $evento->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="cod_proyecto" class="block text-sm font-medium text-gray-700">Proyecto:</label>
                    <input type="text" name="cod_proyecto" id="cod_proyecto" class="mt-1 p-2 border rounded-md w-full">
                </div>
                <!-- <div class="form-field">
                    <label for="tipo">{{ __('Modalidad') }}</label>
                    <select id="modalidad" name="modalidad" required>
                        <option value="poster">Poster</option>
                        <option value="ponencia">Ponencia</option>
                    </select>
                </div> -->
                <div class="flex justify-center">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                        Guardar
                    </button>
                </div>
        </form>
    </div>
</x-app-layout>
