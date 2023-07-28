<x-guest-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-4xl font-bold text-center text-black mb-6">Listado de Proyectos Registrados:</h1>
                <div class="overflow-x-auto">
                    <table class="table-auto w-full border border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border text-center">Título</th>
                                <th class="px-4 py-2 border text-center">Fecha de Inicio</th>
                                <th class="px-4 py-2 border text-center">Fecha de Finalización</th>
                                <th class="px-4 py-2 border text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($proyectos as $proyecto)
                                <tr>
                                    <td class="px-4 py-2 border text-center">{{ $proyecto->titulo }}</td>
                                    <td class="px-4 py-2 border text-center">{{ $proyecto->fecha_inicio }}</td>
                                    <td class="px-4 py-2 border text-center">{{ $proyecto->fecha_finalizacion }}</td>
                                    <td class="px-4 py-2 border text-center">
                                        <form action="{{ route('editar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="text-blue-500 hover:text-blue-700">Editar</button>
                                        </form>
                                        <form action="{{ route('eliminar_proyecto', [$proyecto->cod_proyecto]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto py-4 sm:px-6 lg:px-8">
        <div class="flex justify-center space-x-4">
            <a href="{{ route('registro.proyecto') }}" class="px-3 py-1 text-sm bg-blue-500 text-white rounded-md hover:bg-blue-600">Agregar otro proyecto</a>
        </div>
    </div>
</x-guest-layout>
