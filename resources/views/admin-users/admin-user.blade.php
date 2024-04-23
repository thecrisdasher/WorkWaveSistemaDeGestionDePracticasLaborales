@extends('pages.AdminUsers')

@section('adminuser')
<div class="container-fluid col-12 py-4">
    <div class="row mt-0 mx-4">
        <div class="col-12">
            <a href="{{url('imprimirUsers')}}" target="_blank" class="pull-right">
                <button class="btn btn-success">Imprimir Pdf</button> </a>
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
                            <td class="v-align-middle">{{ $users_admi->city }}</td>
                            <td class="v-align-middle">{{ $users_admi->postal }}</td>
                            <td class="v-align-middle">{{ $users_admi->about }}</td>

                            <td class="v-align-middle">
                                <form action="" method="POST" class="form-horizontal" role="form">

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="" class="btn btndark">Detalles</a>
                                    <a href="{{ route('admin-users.edit', $users_admi->id) }}"
                                        class="btn btnprimary">Editar</a>
                                    <a href="{{ route('admin-users.destroy', $users_admi->id) }}"
                                        data-bs-toggle="modal"data-bs-target="#modal-delete-{{ $users_admi->id }}">
                                        <button type="button" class="btn btn-danger"> Eliminar</button>
                                    </a>
                                    <a href="{{ route('admin-users.create') }}" class="btn btn-success">Agregar </a>
                                </form>
                                {{-- <form action="{{ route('admin-users.destroy', $users_admi->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-title="Borrar">Borrar</button>
                                </form> --}}

                            </td>
                        </tr>
                        @include('admin-users.form.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection
