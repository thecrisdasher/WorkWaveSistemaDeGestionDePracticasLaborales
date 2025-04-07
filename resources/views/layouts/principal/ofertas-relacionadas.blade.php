@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ofertas Relacionadas'])

<div class="container mt-5">
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