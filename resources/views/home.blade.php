@extends('layouts.app')

@section('content')

<div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col">
                <h1 class="text-center text-muted">BIENVENIDO AL SISTEMA DEL  BAR</h1>
            </div>
            <br>
            <br>
        </div>
        <div class="row">
            <div class="col-4"></div>
             <div class="col-8">
                <div id="carouselExampleSlidesOnly" class="carousel slide align-middle" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block" width="50%" src="https://upload.wikimedia.org/wikipedia/commons/2/27/Logo_ESPE.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                             <img class="d-block" width="60%" src="https://cdn.pixabay.com/photo/2017/02/07/00/44/feedback-2044700_960_720.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block" width="50%" src="https://cdn.pixabay.com/photo/2016/01/31/20/55/thumbs-up-1172213_960_720.png" alt="Third slide">
                        </div>
                    </div>
                 </div>
             </div>
        </div>
        <div class="row">
            <div class="col">
                <br>
                <br>
                   <h5 class="text-center text-info">Bienvenido aqui podrás obtener más información sobre el bar.</h5>
                <br>
                <br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger">Preferencias</h5>
                    <p class="card-text">Mira algunas preferencias de nuestros clientes.</p>
                    <br>
                    <a href="http://localhost/EspelBar/public/preferencias" class="btn btn-success">Sugerencias de Los Clientes </a>
                </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-danger">Opinión</h5>
                    <p class="card-text">Las opinión de los clientes que tienen de los Bares.</p>
                    <br>
                    <a href="http://localhost/EspelBar/public/buzons" class="btn btn-success">Buzón de sugerencias</a>
                </div>
                </div>
            </div>
        </div>
        <br>
        <br>
    </div>
        
</div>
@endsection
