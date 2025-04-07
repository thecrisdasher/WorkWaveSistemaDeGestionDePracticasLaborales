@extends('layouts.app')

@section('content')
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">

    </div>
</div>
<main class="main-content  mt-0" style="background-image: url(https://img.pikbest.com/ai/illus_our/20230428/a831e29….jpg);">
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain animate__animated animate__fadeInUp">
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Inicia Sesión</h4>
                                <p class="mb-0">Introduce tu usuario y contraseña para conseguir tus practicas laborales soñadas!</p>
                            </div>
                            <div class="card-body">
                                <form role="form" method="POST" action="{{ route('login.perform') }}">
                                    @csrf
                                    @method('post')
                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email" class="form-control form-control-lg" value="{{ old('email') ?? 'admin@argon.com' }}" aria-label="Email">
                                        @error('email') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="password" name="password" class="form-control form-control-lg" aria-label="Password" value="secret">
                                        @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                        <label style="color: blue;" class="form-check-label" for="rememberMe">Recuerdame</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Ingresar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-1 text-sm mx-auto" style="color: #676767;">
                                    ¿Olvidaste tu contraseña?
                                    <a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">Restablecer</a>
                                </p>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto " style="color: #676767;">
                                    ¿No tienes cuenta?
                                    <a href="{{ route('register') }}" class="text-primary text-gradient font-weight-bold" style="color: blue;">Registrate</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column" style="
                        display: grid !important;
                        align-items: center;
                        justify-items: center;
                        margin-right: 50px;">

                        <div class="animate__animated animate__fadeInDown  position-relative bg-transparent h-100 ml-0 mt-10 m-4 px-1 border-radius-lg d-flex flex-column justify-content-center overflow-hidden background-size: cover;" style="    margin: 0 !important;">
                            <h4 class="mt-5 text-black font-weight-bolder position-relative">"Tus practicas laborales en un par de clicks."</h4>
                            <p class="text-black position-relative">¿Cuantas veces no has caido en la desesperación porque no te llaman de ninguna empresa?, pues eso termino con WorkWave, un sistema que te permitirá encontrar practicas laborales rápidamente.</p>

                            <figure style="background: #ffffff; border-radius: 15px; ">
                                <img src="{{ asset('/img/illustrations/AJC-WW-W_page-0001.png') }}" alt="Background Image" style="height: 400px;" class="">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection