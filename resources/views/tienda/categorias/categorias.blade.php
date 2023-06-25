
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de Categorias') }}
        </h2>
    </x-slot>

    @include('index')

    <div class="container">
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Categoria</th>
                    <th scope="col">Descripción </th>
                    <th scope="col" colspan=2 > <div align="center"> Opciones </div></th>
                </tr>
            </thead>
            <tbody>
            @foreach($categorias as $c)
                    <tr>
                        <td> {{ $c->id }} </td>
                        <td> {{ $c->nombreCategoria }} </td>
                        <td> {{ $c->descripcion }}</td>
                        <td> <a href="" class="btn btn-success">Editar</a></td>
                        <td> <a href="" class="btn btn-danger">Eliminar</a> </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>


</x-app-layout>
