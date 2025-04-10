@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="csrf-token" content="{{csrf_token() }}">
<!-- Aquí puedes poner el contenido del Dashboard -->

<div class="container-fluid py-2">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
            <div class="card1" style="background-color: rgba(0, 0, 0, 0) !important; border: none !important;">
                <div class="card-body d-flex align-items-center justify-content-center p-3">
                    <div class="row">
                        <div class="col-8 text-center">
                            <div class="numbers">
                                <h1 class="mt-3  text-white font-weight-bolder" style="width: 300px;">Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gráficos de Estadísticas -->

<section style="margin-top: 150px;">

    <!-- Gráfico de postulaciones por mes -->
    <div class="container-fluid mt-5" style="    width: 80%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    background: white;
    border-radius: 20px;
    box-shadow: 0 0 2rem 0 rgb(136 152 170 / 35%);">
        <canvas id="postulacionesPorMesChart" style="height: 400px; width: 100%;"></canvas>
    </div>



    <!-- Gráfico de postulaciones por empresa -->
    <div class="container-fluid mt-5" style="    width: 80%;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    background: white;
    border-radius: 20px;
    box-shadow: 0 0 2rem 0 rgb(136 152 170 / 35%);
    margin-bottom: 100px;">
        <canvas id="postulacionesPorEmpresaChart" style="height: 400px; width: 100%;"></canvas>
    </div>


    @endsection

    @push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script>
     // Gráfico de postulaciones por fecha
var ctx1 = document.getElementById('postulacionesPorMesChart').getContext('2d');
var postulacionesPorFechaChart = new Chart(ctx1, {
    type: 'line',
    data: {
        labels: @json($datosPostulacionesPorFecha->pluck('fecha')), // Fechas extraídas de la base de datos
        datasets: [{
            label: 'Postulaciones por Fecha',
            data: @json($datosPostulacionesPorFecha->pluck('total_postulaciones')), // Total de postulaciones por fecha
            borderColor: 'rgba(75, 192, 192, 1)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.4,
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Postulaciones por Fecha'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});


        var ctx2 = document.getElementById('postulacionesPorEmpresaChart').getContext('2d');
var postulacionesPorEmpresaChart = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: @json($datosPostulacionesPorEmpresa->pluck('nombre')),
        datasets: [{
            label: 'Postulaciones por Empresa',
            data: @json($datosPostulacionesPorEmpresa->pluck('total_postulaciones')),
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Postulaciones por Empresa'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

    </script>

    <script>
   
            // Mostrar overlay de carga cuando se aplica un filtro
            $('#filter-form').on('submit', function() {
                $('#loading-overlay').css('display', 'flex');
            });
        });
    </script>

    @endpush