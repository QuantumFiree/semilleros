@extends('menu')
@section('contenido')

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-12" align="center">
            <div class="card" style="width: 30rem;">
                <img src='{{url("/imagenes/productos/$producto->fotoProducto")}}' class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> {{ $producto->nombreProducto}} </h5>
                    <p class="card-text"> Identificador: {{$producto->id}} </p>
                    <p class="card-text"> Precio:: {{$producto->precioProducto}} </p>
                    <p class="card-text"> Cantidad {{$producto->cantidadProducto}} </p>
                    <p class="card-text"> Categoria: {{$producto->category->nombreCategoria}} </p>

                </div>
                <div style="color: blue" align="center">
                    @if($producto->stock())
                            <p class="card-text"> Ultimas Unidades Disponibles </p>
                    @endif
                </div>
                <a href="{{route('form_actualizaProducto', $producto->id)}}" class="btn btn-primary" > Editar </a>
                <br>
                <a href="{{route('eliminarProducto', $producto->id)}}" class="btn btn-danger" > Eliminar </a>
                <br>
                <a href="{{route('productos')}}" class="btn btn-success" >Volver </a>
            </div>

        </div>
    </div>
</div>
@endsection

