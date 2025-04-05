@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Mis postulaciones'])


<div class="container-fluid py-2">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-4 mb-4">
            <div class="card1" style="background-color: rgba(0, 0, 0, 0) !important; border: none !important;">
                <div class="card-body d-flex align-items-center justify-content-center p-3">
                    <div class="row">
                        <div class="col-8 text-center">
                            <div class="numbers">
                                <h1 class="mt-3  text-white font-weight-bolder" style="width: 400px;">Mis postulaciones</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@include('layouts.footers.auth.footer')
@endsection


@push('js')

@endpush