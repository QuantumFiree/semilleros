@extends('master')
@section('menu')
    @parent

    <nav class="navbar navbar-expand-lg navbar-light bg-light"  >
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{asset('imagenes/logo.png')}}" width="340" height="90" class="d-inline-block align-text-top" alt="" loading="lazy">
            
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('login') }}">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('register') }}">Registrarse</a>
                </li>
            </ul>
        </div>

        <span class="navbar-item">
            <a class="nav-link text-white bg-dark" href="{{ url('../') }}">Bienvenido</a>
        </span>
    </nav>
@endsection

@section('content')

    <div class="container">
        <div class="card text-dark bg-light mb-3">

            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('imagenes/carrusel1.jpg')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> </h5>
                            <p> </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel2.jpg')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> </h5>
                            <p> </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel3.jpg')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> </h5>
                            <p> </p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>

            <div class="card-body">
                <h2 class="card-title">Semilleros</h2>
                <p class="card-text">El semillero de investigación Green Clouds nace a comienzos del año 2020 como producto de las 
                    iniciativas y necesidades de formación en investigación de los estudiantes pertenecientes al programa de Ingeniería de Sistemas 
                    de la Universidad de Nariño en la sede Ipiales. Su nombre hace alusión a la ciudad de las “Nubes verdes” de la misma forma que se 
                    asocia al término “Cloud”, el cual dentro del campo computacional tiene un significado de gran valor relacionado con la interacción 
                    entre individuos a través del uso de tecnologías de la Información y Comunicación y la conectividad a Internet.</p>
                                    <h5>¡TANTUM POSSUMUS QUANTUM SCIMUS!</h5>
            </div>
        </div>
    </div>
@endsection