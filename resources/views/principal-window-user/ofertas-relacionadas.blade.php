@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ofertas Relacionadas'])

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
                                <h1 class="mt-3  text-white font-weight-bolder" style="width: 300px;">Ofertas relacionadas</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="container mt-5" style="margin-top: 200px;">
    <h2 class="text-center">Resultados para: "{{ $query }}"</h2>

    @if($ofertas->isEmpty())
        <p class="text-center mt-4">No se encontraron ofertas relacionadas.</p>
    @else
        <div class="row mt-4">
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
    @endif
</div>
@endsection