@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tu perfil'])
<div class="card shadow-lg mx-4 mt-4 card-profile-bottom" style="    align-items: flex-start;">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    @if(auth()->user()->photo)
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Photo" class="w-100 border-radius-lg shadow-sm" style="height: 100%; object-fit: cover;">
                    @else
                    <img src="{{ asset('https://cdn-icons-png.flaticon.com/512/12225/12225881.png') }}"
                        alt="Default Profile Photo" class="w-100">
                    @endif
                </div>
            </div>

            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        <strong>Hola, </strong>
                        {{ auth()->user()->firstname ?? 'Firstname' }}
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid col-12 mt-5 py-4">

    <div class="row" style="justify-content: center; width: 100%;">
        <div class="col-md-8">

            <div class="card">

                <form id="profile-form" role="form" method="POST" action="{{ route('profile.update') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Editar Perfil</p>
                        </div>
                        <hr class="horizontal dark">
                    </div>
                    <div class="card-body">
                        <p class="text-uppercase text-sm">Información del usuario</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Nombre de usuario</label>
                                    <input class="form-control" type="text" name="username"
                                        value="{{ old('username', auth()->user()->username) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Direcion de correo</label>
                                    <input class="form-control" type="email" name="email"
                                        value="{{ old('email', auth()->user()->email) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Primer nombre</label>
                                    <input class="form-control" type="text" name="firstname"
                                        value="{{ old('firstname', auth()->user()->firstname) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Segundo nombre</label>
                                    <input class="form-control" type="text" name="lastname"
                                        value="{{ old('lastname', auth()->user()->lastname) }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="photo" class="form-control-label">Foto de perfil</label>
                                    <input class="form-control" type="file" name="photo">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        @php
                        $userRole = auth()->user()->id_rol ?? null; // Obtén el rol del usuario autenticado
                        @endphp
                        @if ($userRole == \App\Enums\RolType::Estudiante->value) <!-- Mostrar solo para el rol estudiante -->
                        <p class="text-uppercase text-sm">Información educativa</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Programa</label>
                                    <input class="form-control" type="text" name="facultad"
                                        value="{{ old('facultad', auth()->user()->facultad) }}" disabled> <!-- Campo deshabilitado -->
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Carrera</label>
                                    <input class="form-control" type="text" name="carrera"
                                        value="{{ old('carrera', auth()->user()->carrera) }}" disabled> <!-- Campo deshabilitado -->
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        @endif

                        <p class="text-uppercase text-sm">Information de contacto</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Direcion</label>
                                    <input class="form-control" type="text" name="address"
                                        value="{{ old('address', auth()->user()->address) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Ciudad</label>
                                    <input class="form-control" type="text" name="city"
                                        value="{{ old('city', auth()->user()->city) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Pais</label>
                                    <input class="form-control" type="text" name="country"
                                        value="{{ old('country', auth()->user()->country) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Codigo postal</label>
                                    <input class="form-control" type="text" name="postal"
                                        value="{{ old('postal', auth()->user()->postal) }}">
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Sobre mi</p>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" type="text" name="about"
                                      style="height: 200px; resize: none; overflow-y: hidden;"
                                        value=" {{ old('about', auth()->user()->about) }}"
                                        oninput="autoResize(this); checkCharacterLimit(this, 200);">
                                    {{ old('about', auth()->user()->about) }}

                                    </textarea>
                                </div>
                            </div>

                        </div>
                        <div id="alert-container" class="d-none-perfil"></div> <!-- Contenedor para la alerta -->
                        <button style="width: 180px; height: 40px;" onclick="setTimeout(function(){location.reload();}, 3000);" type="submit" class="btn btn-primary btn-sm ms-auto">Actualizar perfil</button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('profile-form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío normal del formulario

            let formData = new FormData(this);

            fetch("{{ route('profile.update') }}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                })
                .then(response => response.json())
                .then(data => {
                    // Verificamos si la respuesta es exitosa
                    const alertContainer = document.getElementById('alert-container');

                    // Para depurar, mostramos la respuesta en la consola
                    console.log(data); // Ver respuesta en la consola

                    // Verificamos si la respuesta es exitosa
                    if (data.success) {
                        // Creamos la alerta de éxito
                        alertContainer.innerHTML = `
                       <div class="alert d-none-perfil alert-success alert-dismissible fade show " style="background: green; color: white; display: block;" role="alert">
                            ${data.message || 'Se actualizó el perfil correctamente.'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    } else {
                        // En caso de error, mostramos una alerta de error
                        alertContainer.innerHTML = `
                           <div class="alert d-none-perfil alert-success alert-dismissible fade show" style="background: red; color: white; display: block;" role="alert">
                            ${data.message || 'No se pudo actualizar el perfil. Intenta nuevamente.'}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    }

                    // Mostramos el contenedor de alerta con animación de entrada
                    alertContainer.classList.remove('d-none-perfil');
                    setTimeout(() => {
                        alertContainer.querySelector('.alert').classList.add('show'); // Para Bootstrap 5
                    }, 10); // Asegura que la clase 'show' se agregue después de un pequeño delay

                    // Recargar la página después de un breve tiempo
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });
</script>
<script>
    // Función para ajustar dinámicamente el tamaño del textarea
    function autoResize(textarea) {
        textarea.style.height = 'auto'; // Reseteamos la altura
        textarea.style.height = (textarea.scrollHeight) + 'px'; // Establecemos la nueva altura
    }

    // Función para verificar el límite de caracteres
    function checkCharacterLimit(textarea, limit) {
        const charLimitMessage = document.getElementById('char-limit-message');
        const currentLength = textarea.value.length; // Longitud actual del texto
        if (currentLength > limit) {
            charLimitMessage.style.display = 'block'; // Mostramos el mensaje de error
        } else {
            charLimitMessage.style.display = 'none'; // Ocultamos el mensaje de error
        }
    }
</script>