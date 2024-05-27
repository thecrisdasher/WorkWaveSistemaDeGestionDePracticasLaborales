@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 mt-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        @if(auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Photo" class="w-100 border-radius-lg shadow-sm">
                        @else
                            <img src="{{ asset('storage/default_profile_photo.jpg') }}"
                                alt="Default Profile Photo" class="w-100 border-radius-lg shadow-sm">
                        @endif
                    </div>
                </div>

                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->firstname ?? 'Firstname' }} {{ auth()->user()->lastname ?? 'Lastname' }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            Public Relations
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid col-12 mt-5 py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <form id="profile-form" role="form" method="POST" action="{{ route('profile.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Editar Perfil</p>
                                <button onclick="setTimeout(function(){location.reload();}, 1000);" type="submit" class="btn btn-primary btn-sm ms-auto">Save</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Información del usuario</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username"
                                            value="{{ old('username', auth()->user()->username) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Email address</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">First name</label>
                                        <input class="form-control" type="text" name="firstname"
                                            value="{{ old('firstname', auth()->user()->firstname) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Last name</label>
                                        <input class="form-control" type="text" name="lastname"
                                            value="{{ old('lastname', auth()->user()->lastname) }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="photo" class="form-control-label">Profile Photo</label>
                                        <input class="form-control" type="file" name="photo">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Contact Information</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Address</label>
                                        <input class="form-control" type="text" name="address"
                                            value="{{ old('address', auth()->user()->address) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">City</label>
                                        <input class="form-control" type="text" name="city"
                                            value="{{ old('city', auth()->user()->city) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Country</label>
                                        <input class="form-control" type="text" name="country"
                                            value="{{ old('country', auth()->user()->country) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Postal code</label>
                                        <input class="form-control" type="text" name="postal"
                                            value="{{ old('postal', auth()->user()->postal) }}">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">About me</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">About me</label>
                                        <input class="form-control" type="text" name="about"
                                            value="{{ old('about', auth()->user()->about) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Image placeholder" class="card-img-top">
                    <div class="row justify-content-center">
                        <div class="col-4 col-lg-4 order-lg-2">
                            <div class="mt-n4 mt-lg-n6 mb-4 mb-lg-0">
                                <a href="javascript:;">
                                    <img src="{{ auth()->user()->photo ? asset('storage/' . auth()->user()->photo) : '' }}"
                                        class="rounded-circle img-fluid border border-2 border-white">
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body pt-0">
                        <div class="text-center mt-4">
                            <h5>
                                {{ auth()->user()->firstname ?? 'Firstname' }}
                                {{ auth()->user()->lastname ?? 'Lastname' }}<span class="font-weight-light">,
                                    {{ auth()->user()->age ?? 'Age' }}</span>
                            </h5>
                            <div class="h6 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ auth()->user()->city ?? '' }},
                                {{ auth()->user()->country ?? 'Country' }}
                            </div>
                            <div class="h6 mt-4">
                                    <i class="ni business_briefcase-24 mr-2"></i>{{ auth()->user()->id_rol ?? '' }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
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
                if (data.success) {
                    document.getElementById('profile-image').src = data.photo_url;
                    document.getElementById('alert').innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Profile updated successfully!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                    alert(data.message); //
                    // Mostrar la alerta
                    document.getElementById('alert').classList.remove('d-none');
                    // Recargar la página después de un breve tiempo
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                } else {
                    // Manejo de errores si es necesario
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
</script>



