@extends('pages.AdminUsers')

@section('adminuser')
        <div class="row mt-0 mx-4">
            <div class="col-12">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card mb-4">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>Nombre De Usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Email</th>
                                        <th>Ciudad</th>
                                        <th>Postal</th>
                                        <th>Sobre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users_admin as $users_admi)
                                        <tr>
                                            <td class="v-align-middle">{{ $users_admi->username }}</td>
                                            <td class="v-align-middle">{{ $users_admi->firstname }}</td>
                                            <td class="v-align-middle">{{ $users_admi->lastname }}</td>
                                            <td class="v-align-middle">{{ $users_admi->email }}</td>

                                            <td class="v-align-middle">
                                                <form action="" method="POST" class="form-horizontal" role="form">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <a href="" class="btn btndark">Detalles</a>
                                                    <a href="{{ route('admin-users.edit', $users_admi->id) }}" class="btn btnprimary">Editar</a>
                                                    <a href=""
                                                        data-bs-toggle="modal"data-bs-target="#modal-delete-{{ $users_admi->id }}">
                                                        <button type="button" class="btn btn-danger"> Eliminar</button>
                                                    </a>
                                                    <a href="{{ route('admin-empresas.create') }}"
                                                        class="btn btn-success">Agregar </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @include('admin-users.form.modal')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
@endsection
