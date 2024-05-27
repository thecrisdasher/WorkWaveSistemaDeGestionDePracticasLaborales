@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])
@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ofertas'])
    <div class="container-fluid col-12 py-0">
        <div class="ofertasshowadmins mt-1">
            <div class="row mt-1">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card">
                        <div class="container col-md-auto pb-12 ">
                            <header>

                                <h3 class="mt-4">{{ $oferta->nombre_oferta }}</h3>
                                <p class="col-7 text-justify">{{ $oferta->descripcion}}</p>
                            </header>

                            <p><strong>Salario:</strong>{{ $oferta->salario}}</p>
                            <p><strong>Ubicacion:</strong>{{ $oferta->Ubicacion->direccion}}</p>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botonPostularme = document.getElementById('postularme');

            botonPostularme.addEventListener('click', function() {
                const ofertaId = {{ $oferta->id_oferta }}; // Obtener el ID de la oferta desde la vista

                // Realizar la solicitud AJAX para postularse
                fetch(`/oferta/postularme/${ofertaId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Mostrar mensaje de éxito
                    alert(data.message);
                    // Cambiar el texto del botón a "Te has postulado con éxito"
                    botonPostularme.textContent = 'Te has postulado con éxito';
                    botonPostularme.disabled = true; // Opcional: deshabilitar el botón después de postularse
                })
                .catch(error => {
                    console.error('Error al postularse:', error);
                });
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
