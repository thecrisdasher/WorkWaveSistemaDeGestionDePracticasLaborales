@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ofertas'])
<!-- Agregar CSS de Slick Carousel -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<div class="container-fluid py-2" style="height: 35vh;">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
            <div class="card1" style="background-color: rgba(0, 0, 0, 0) !important; border: none !important;">
                <div class="card-body d-flex align-items-center justify-content-center p-3">
                    <div class="row">
                        <div class="col-8 text-center">
                            <div class="numbers">
                                <h1 class="mt-3  text-white font-weight-bolder" style="width: 600px;">Conoce la oferta de <strong style="color: aqua; ">{{ $oferta->nombre_oferta }}</strong></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid col-12 py-0 row mt-0 mx-4 ">
    <div class="ofertasshowadmins mt-1" style="display: flex; align-items: center;
    justify-content: center;">
        <div class="row mt-1">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card ">
                    <div class="container col-md-auto pb-12 ">
                        <header>
                            <p style="color: #000;  font-weight: bold; font-size: 30px;" class="mt-4">{{ $oferta->nombre_oferta }}</p>
                            <p>{{ $oferta->Ubicacion->ciudad}} - {{ \Carbon\Carbon::parse($oferta->updated_at)->diffForHumans() }}
                            </p>
                            <meta name="csrf-token" content="{{ csrf_token() }}">
                            <!-- Botón Postularme -->
                            @if(auth()->check())
                                <button id="postularmeButton" class="btn btn-primary" data-id-oferta="{{ $oferta->id_oferta }}" onclick="postularme(this)">
                                    Postularme
                                </button>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-secondary">
                                    Inicia sesión para postularte
                                </a>
                            @endif
                            <h3 style="color: #000; font-size: 20px; margin-bottom: 0;">Acerca del empleo</h3>
                            <p class="mt-4" style="color: #373737;     margin-top: 0 !important;
                            font-size: 15px;">{{ $oferta->nombre_oferta }}</p>
                            <p>{{ $oferta->descripcion}}</p>
                            </header>
                            <p><strong>Salario: </strong>{{ $oferta->salario}}</p>
                            <hr>
                            <div style="border: 1px solid rgba(0, 0, 0, 0.19); padding: 20px; border-radius: 15px;">
                            <h3 style="color: #595959; font-size: 20px;">Acerca de la empresa</h3>
                            <p style="color:rgb(41, 41, 41)">{{$oferta->Empresa->nombre}}
                            <p p class="col-7 text-justify">{{ $oferta->Empresa->razon_social}}</p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Slider de Ofertas -->
<h2 style="text-align: center; font-size: 24px; color: #000; margin: 40px 0;">Otras ofertas</h2>
<div class="container-fluid mt-5" style="    
    width: 100%;
    height: 400px;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;">
    <div class="offer-slider" style="width: 80%; height: 250px;">
        @foreach($otras_ofertas as $oferta)
        <div class="card" style="border: none; margin: 10px;">
            <div class="card-body" style="height: 300px;">
                <h5 class="card-title" style="height: 100px;">{{ $oferta->nombre_oferta }}</h5>
                <p style="height: 100px; overflow: hidden;">{{ $oferta->descripcion}}.....</p>
                <a href="{{ route('oferta.show', $oferta->id_oferta) }}" class="btn btn-primary">Ver Oferta</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
@push('js')
<script>
    // Función que se ejecuta cuando el usuario hace clic en "Postúlate"
    function postularme(button) {
        let ofertaId = button.getAttribute('data-id-oferta');
        let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        console.log('Postulando a la oferta con ID:', ofertaId); // Depuración

        fetch(`/oferta/postularme/${ofertaId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                body: JSON.stringify({
                    id: ofertaId
                })
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        console.error('Error:', data.message); // Depuración
                        alert(data.message);
                        button.innerHTML = 'Ya te has postulado';
                        button.disabled = true;
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Respuesta exitosa:', data.message); // Depuración
                alert(data.message);
                button.innerHTML = 'Ya te has postulado';
                button.disabled = true;
            })
            .catch(error => {
                console.error('Error en la solicitud:', error);
            });
    }
</script>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
    $(document).ready(function() {
        // Activamos el slider
        $('.offer-slider').slick({
            infinite: true, // Hacer que el slider sea infinito
            slidesToShow: 3, // Número de ofertas que se muestran al mismo tiempo
            slidesToScroll: 1, // Cuántos elementos se desplazan por vez
            autoplay: true, // Activar el desplazamiento automático
            autoplaySpeed: 2000, // Tiempo entre desplazamientos
            responsive: [{
                    breakpoint: 1024, // En pantallas pequeñas
                    settings: {
                        slidesToShow: 2, // Mostrar 2 elementos en pantallas medianas
                    }
                },
                {
                    breakpoint: 600, // En pantallas muy pequeñas
                    settings: {
                        slidesToShow: 1, // Mostrar 1 elemento en pantallas pequeñas
                    }
                }
            ]
        });
    });
</script>
@endpush

@push('js')
<script src="./assets/js/plugins/chartjs.min.js"></script>
<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#fb6340",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>
@endpush