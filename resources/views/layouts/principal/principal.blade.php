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
<div class="input-group" style="position:relative; width: 70%; margin:50px auto;">
    <input id="search-input" style="border-radius: 20px; height: 70px;" type="text" class="form-control buscador" placeholder="Busca tus prácticas ideales aquí...">
    <button id="search-button" class="btn btn-primary" style="margin-left: 10px; height: 70px; border-radius: 15px;">Ofertas Relacionadas</button>
</div>

<!-- Overlay de "Buscando..." -->
<div id="search-overlay" style="
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
        <span class="visually-hidden">Buscando...</span>
    </div>
    <p style="margin-top: 10px; font-size: 18px; color: #000;">Buscando ofertas relacionadas...</p>
</div>

<!-- Contenedor para mostrar las ofertas relacionadas -->
<div id="related-offers" class="list-group" style="
    display: none;
    margin-top: 20px;
    width: 70%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 15px;
    background: #ffffff78;
    backdrop-filter: blur(5px);
    z-index: 99;">
</div>

<!-- Sección de Ofertas -->
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
                <a style="color: white;" href="{{ route('page', ['page' => 'principal']) }}">Limpiar Filtros</a>
            </button>
        </form>
    </div>

    <!-- Ofertas en dos columnas -->
    <h2 style="text-align: center; font-size: 24px; color: #000; margin: 120px 0;">Ofertas disponibles</h2>
    <div class="container" style="width: 80%; display: flex; justify-content: center;">
        <div class="row">
            @foreach($ofertas as $oferta)
            <div class="col-md-6 mb-4">
                <div class="card" style="border: none; padding: 15px; align-items: flex-start;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $oferta->nombre_oferta }}</h5>
                        <p style="height: 100px; overflow: hidden;">{{ $oferta->descripcion }}.....</p>
                        <a href="{{ route('oferta.show', $oferta->id_oferta) }}" class="btn btn-primary">Ver Oferta</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Slider de Empresas -->
<h2 style="text-align: center; font-size: 24px; color: #000; margin: 120px 0;">Empresas</h2>
<div class="container-fluid mt-5" style="width: 80%; display: flex; justify-content: center; flex-wrap: wrap;">
    <div class="offer-slider" style="width: 100%; height: 250px;">
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

<!-- Gráfico de Ofertas -->
<h2 style="text-align: center; font-size: 24px; color: #000; margin: 120px 0;">Fecha nuevas empresas</h2>
<div class="container" style="width: 80%; margin-bottom: 50px;">
    <canvas id="ofertasChart"></canvas>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

        // Gráfico de Empresas por Fecha de Creación
        const ctx = document.getElementById('ofertasChart').getContext('2d');
        const empresasChart = new Chart(ctx, {
            type: 'line', // Cambiado a línea para mostrar tendencias
            data: {
                labels: @json($empresasPorFecha->pluck('fecha')), // Fechas de creación
                datasets: [{
                    label: 'Cantidad de Empresas',
                    data: @json($empresasPorFecha->pluck('total')), // Cantidad de empresas por fecha
                    backgroundColor: 'rgba(75, 192, 192, 0.5)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad de Empresas'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Fecha de Creación'
                        }
                    }
                }
            }
        });

        // Evento para buscar ofertas relacionadas
        $('#search-button').on('click', function(e) {
            e.preventDefault();

            const query = $('#search-input').val(); // Obtener el texto ingresado
            if (!query) {
                alert('Por favor, ingresa un término de búsqueda.');
                return;
            }

            // Mostrar el overlay de "Buscando..."
            $('#search-overlay').css('display', 'flex');

            // Redirigir al nuevo apartado con el término de búsqueda
            window.location.href = "{{ route('buscar.ofertas') }}?query=" + encodeURIComponent(query);
        });
    });
</script>
@endpush