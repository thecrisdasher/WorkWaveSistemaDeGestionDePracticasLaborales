@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])


@section('content')
<meta name="csrf-token" content="{{csrf_token() }}">
    @include('layouts.navbars.auth.topnav', ['title' => 'Principal'])
    <div class="row mt-2 mx-8">
        <div class="">
                <div class="card1" style="background-color: rgba(0, 0, 0, 0) !important; border: none !important;">
                    <div class="card-body d-flex align-items-center justify-content-center p-2">
                        <div class="row">
                            <div class="col-12 text-center">
                                <div class="numbers">
                                    <h3 class="mt-0 text-white font-weight-bolder">¡Es hora de cambiar tu futuro!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--form-control es el buscador-->
        <div class="input-group rounded-circle" style="position:relative">
             <span class="input-group-text text-body ">
            </span>

            <input type="text" class="form-control buscador" placeholder="Busca tus practicas ideales aquí..." >
            <span class="input-group-text text-body "><a href="{{ url('busqueda')}}" type="button" class="btn btn-success mx-0 mt-3" >Buscar Practicas</a>
            </span>

            {{-- <div class="input-group rounded-circle" style="position: absolute;    top: 100%;
            background: white;
            width: 100%;">
                <h1>ANUEL</h1> --}}

            </div>
            <ul id="showlist" tabindex="1" class="list-group" style="position: absolute top: 100%"></ul>
        </div>
    </div>


    @include('layouts.footers.auth.footer')
@endsection


@push('js')
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script src="./assets/js/search.js" type="module"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("id");

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
