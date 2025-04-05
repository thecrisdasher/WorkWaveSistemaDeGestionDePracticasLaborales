@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0" style="height: 110vh; overflow: auto;">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background: url(https://img.pikbest.com/ai/illus_our/20230428/a831e293e8f2a502eb0b358bd37e14b3.jpg);; background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Bienvenido!</h1>
                        <p class="text-lead text-white">Registrate y encuentra tus practicas laborales.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n11 mt-md-n5 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0" style="box-shadow: 0 0 2rem 0 rgb(0 0 0 / 25%);">
                        <div class="card-header text-center pt-4">
                            <h5>Registrate!</h5>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register.perform') }}">
                                @csrf
                                <div class="flex flex-col mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="Usuario" aria-label="Name" value="{{ old('username') }}" >
                                    @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Correo" aria-label="Email" value="{{ old('email') }}" >
                                    @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Contraseña" aria-label="Password">
                                    @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                </div>
                                <div class="form-check form-check-info text-start">
                                    <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault" >
                                    <label class="form-check-label" for="flexCheckDefault">
                                    Acepto los <a href="javascript:;" class="text-dark font-weight-bolder">Términos y Condiciones</a>
                                    </label>
                                    @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Registrarme</button>
                                </div>
                                <p class="text-sm mt-3 mb-0">Ya tengo una cuenta <a href="{{ route('login') }}"
                                        class="text-dark font-weight-bolder">Ingresar</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')
@endsection
