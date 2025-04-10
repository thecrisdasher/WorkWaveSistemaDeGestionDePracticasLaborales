@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="csrf-token" content="{{csrf_token() }}">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />

<!-- Aquí puedes poner el contenido del Dashboard -->

<div class="container-fluid py-2 " style="width: auto;
    background: green;
    display: flex
;
    justify-content: center;">
    <div class="row" style="width: 80%;">
        <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
            <div class="card1" style="background-color: rgba(0, 0, 0, 0) !important; border: none !important;">
                <div class="card-body d-flex align-items-center justify-content-center p-3">
                    <div class="row">
                        <div class="col-8 text-center">
                            <div class="numbers">
                                <h1 class="mt-3 animate__animated animate__fadeInUp  text-white font-weight-bolder" style="    width: 500px;
    display: flex;
    align-items: center;
    justify-content: flex-end;">Mis estadisticas 📊</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container animate__animated animate__fadeInDown" style="margin-top: 150px;">
    <div class="row" style="
    gap: 50px;
    justify-content: center;">
        <!-- Tarjeta: Total de Postulaciones -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3" style="width: 300px;">
                <div class="card-header post" style="width: 100%;
        color: #5d5d5d;
        font-weight: bold;">Total de Postulaciones</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $totalPostulaciones }}</h5>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Postulaciones Aceptadas -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3" style="width: 300px;">
                <div class="card-header" style="width: 100%;
        color: #5d5d5d;
        font-weight: bold;">Postulaciones Aceptadas</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $postulacionesAceptadas }}</h5>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Postulaciones Rechazadas -->
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3" style="width: 300px;">
                <div class="card-header " style="width: 100%;
        color: #5d5d5d;
        font-weight: bold;">Postulaciones Rechazadas</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $postulacionesRechazadas }}</h5>
                </div>
            </div>
        </div>

        <!-- Tarjeta: Postulaciones Pendientes -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3" style="width: 300px;">
                <div class="card-header" style="width: 100%;
        color: #5d5d5d;
        font-weight: bold;">Postulaciones Pendientes</div>
                <div class="card-body">
                    <h5 class="card-title text-white">{{ $postulacionesPendientes }}</h5>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfica (opcional, usando Chart.js) 
    <div class="mt-5">
        <h2>fhrdth</h2>
        <canvas id="postulacionesChart"></canvas>
    </div>
</div>-->
    @endsection
    @section('scripts')


    @endsection