<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="/"
            target="_blank">
            <img src={{asset('/img/logo-ct-dark.png')}} class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">WorkWave, La Revolución</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @php
            $userRole = auth()->user()->id_rol ?? null; // Obtén el rol del usuario autenticado
            @endphp

            {{-- Menú según el rol del usuario --}}
            @if ($userRole == \App\Enums\RolType::Estudiante->value)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'principal' ? 'active' : '' }}" href="{{ route('page', ['page' => 'principal']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Principal </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mi Perfil</span>
                </a>
            </li>
            <li class="nav-item">
    <a class="nav-link {{ Route::currentRouteName() == 'statistics' ? 'active' : '' }}" href="{{ route('postulaciones.statistics') }}">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="ni ni-chart-bar-32 text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Mis estadísticas</span>
    </a>
</li>
            @elseif ($userRole == \App\Enums\RolType::Admin->value)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('page', ['page' => 'dashboard']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'principal' ? 'active' : '' }}" href="{{ route('page', ['page' => 'principal']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Principal Estudiante</span>
                </a>
            </li>

            {{-- Menú común para todos los roles --}}
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Menú de opciones</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mi Perfil</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'oferta') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'oferta']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin. De Ofertas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'admin-empresas') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'admin-empresas']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin. De Empresas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'admin-users') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'admin-users']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin. De Usuarios</span>
                </a>



                @elseif ($userRole == \App\Enums\RolType::Empresa->value)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin-empresas' ? 'active' : '' }}" href="{{ route('page', ['page' => 'admin-empresas']) }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard Empresa</span>
                </a>
            </li>


            {{-- Menú común para todos los roles --}}
            <li class="nav-item mt-3 d-flex align-items-center">
                <div class="ps-4">
                    <i class="fab fa-laravel" style="color: #f4645f;"></i>
                </div>
                <h6 class="ms-2 text-uppercase text-xs font-weight-bolder opacity-6 mb-0">Menú de opciones</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mi Perfil</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ str_contains(request()->url(), 'admin-empresas') == true ? 'active' : '' }}" href="{{ route('page', ['page' => 'admin-empresas']) }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-bullet-list-67 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Admin. De Empresas</span>
                </a>
            </li>


            @endif



        </ul>
    </div>
    <style>
    .active {
        background-color:rgba(220, 161, 255, 0.27) !important;
        color: #000 !important;
    }

    .nav-link:hover{
        background-color:rgba(189, 161, 255, 0.23) !important;
        color: blueviolet !important;
    }
</style>
</aside>