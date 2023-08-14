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
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
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
                        <img src="{{asset('imagenes/carrusel2.png')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5></h5>
                            <p>Sede Pasto</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel3.jpeg')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <div style="background-color: rgba(41,41,41,0.5) ; color: #efefef ; ">
                                <h5>Semillero de Investigación-Ingeniería de Sistemas</h5> 
                            </div>
                            <b><font color="black">Sede Tumaco</font></b> 
                            
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel4.jpg')}}" height="440" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5> </h5>
                            <p> </p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{asset('imagenes/carrusel5.jfif')}}" height="440" class="d-block w-100" alt="...">
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
                <h2 class="card-title">SEMILLEROS</h2> 
                <p class="card-text">El programa de Ingeniería de Sistemas de la Universidad de Nariño cuenta actualmente con tres semilleros de investigación en el área de las Ciencias de Computación.</p>
                <h5>Willa Muru</h5>
                <p class="card-text">Semillero de Investigación en la sede Pasto. Coordinador Mg. Paola Arturo Delgado.</p>
                <h5>TecnoPazifico</h5>
                <p class="card-text">Semillero de Investigación en la sede Tumaco. Coordinador Ing. Carlos Aurelio Rodríguez Molina.</p>
                <h5>Green Clouds</h5>
                <p class="card-text">Semillero de Investigación en la sede Ipiales. Coordinador Ing. Sandra Marcela Guerrero Calvache.</p>
                <br><h5 style="text-align: right">¡TANTUM POSSUMUS QUANTUM SCIMUS!</h5>
            </div>
        </div>
    </div>
@endsection