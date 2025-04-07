@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Principal'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- Overlay de carga -->
<div id="loading-overlay" style="
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(255, 255, 255, 0.8);
    backdrop-filter: blur(5px);
    z-index: 9999;
    justify-content: center;
    align-items: center;
    flex-direction: column;
">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Filtrando...</span>
    </div>
    <p style="margin-top: 10px; font-size: 18px; color: #000;">Filtrando resultados...</p>
</div>

<!-- Buscador -->


<!--form-control es el buscador-->
<div class="input-group rounded-circle" style="position:relative; width: 70%; margin:50px auto; background-color: red;">

    <input style="border-radius: 20px; height: 70px;" type="text" class="form-control buscador" placeholder="Busca tus practicas ideales aquí...">

    <ul id="showlist" tabindex="1" class="list-group" style="
    top: 100%;
    display: none;
    cursor: pointer;
    width: 100%;
    gap: 10px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 15px;
    position: absolute;
    background: #ffffff78;
    backdrop-filter: blur(5px);
    z-index: 99;"></ul>
</div>
</div>




<section>
    <div class="container" style="margin-bottom: 30px; top: 80px; position: relative; display: flex; justify-content: center; flex-wrap: wrap; width: 100%;">
        <form method="GET" action="{{ route('principal') }}" id="filter-form">
            <div class="row" style="gap: 100px;">
                <div class="col-md-4">
                    <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                    <select name="fecha_publicacion" class="form-select" id="fecha_publicacion" style="width: 250px;">
                        <option value="">Selecciona una opción</option>
                        <option value="hoy" {{ request('fecha_publicacion') == 'hoy' ? 'selected' : '' }}>Hoy</option>
                        <option value="semana" {{ request('fecha_publicacion') == 'semana' ? 'selected' : '' }}>Esta Semana</option>
                        <option value="mes" {{ request('fecha_publicacion') == 'mes' ? 'selected' : '' }}>Este Mes</option>
                    </select>
                </div>

                <div class="col-md-4">
    <label for="cargo" class="form-label">Empresa</label>
    <select name="cargo" class="form-select" id="cargo" style="width: 250px;">
        <option value="">Selecciona una empresa</option>
        <option value="all" {{ request('cargo') == 'all' ? 'selected' : '' }}>Seleccionar todas</option>
        @foreach ($empresas as $empresa)
        <option value="{{ $empresa->nombre }}" {{ request('cargo') == $empresa->nombre ? 'selected' : '' }}>
            {{ $empresa->nombre }}
        </option>
        @endforeach
    </select>
</div>

            </div>
            <button type="submit" class="btn btn-primary mt-3">Aplicar Filtros</button>
            <button type="button" class="btn btn-secondary mt-3" id="reset-filters">
            <a style="color: white;" href="{{ route('page', ['page' => 'principal']) }}">Limpiar Filtros</a></button>
        </form>
    </div>

    <!-- Ofertas en dos columnas -->
    <h2 style="text-align: center; font-size: 24px; color: #000; margin: 120px 0;">Ofertas disponibles</h2>
    <div class="container" style="    width: 80%;
    display: flex
;
    justify-content: center;">
        <div class="row">
            @foreach($ofertas as $oferta)
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; padding: 15px; align-items: flex-start;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $oferta->nombre_oferta }}</h5>
                        <p style="height: 100px; overflow: hidden;">{{ $oferta->descripcion}}.....</p>
                        <a href="{{ route('oferta.show', $oferta->id_oferta) }}" class="btn btn-primary">Ver Oferta</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Slider de Ofertas -->
<h2 style="text-align: center; font-size: 24px; color: #000; margin: 120px 0;">Empresas</h2>
<div class="container-fluid mt-5" style="width: 80%; display: flex; justify-content: center; flex-wrap: wrap;">
    <div class="offer-slider" style="width: 100%; height: 250px; ">
        @foreach($empresas as $empresa)
        <div class="card" style="border: none; margin: 10px;">
            <div class="card-body" style="height: 150px;">
                <h5 class="card-title" style="height: 50px;">{{ $empresa->nombre }}</h5>
                <p class="card-title" style="height: 100px;">{{ $empresa->razon_social }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>




@endsection

<style>
    .card {
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: scale(1.1);
        box-shadow: 0 0 2rem 0 rgba(0, 0, 0, 0.2);
        z-index: 99;
    }
</style>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.offer-slider').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });

        // Mostrar overlay de carga cuando se aplica un filtro
        $('#filter-form').on('submit', function() {
            $('#loading-overlay').css('display', 'flex');
        });
    });
</script>
@endpush