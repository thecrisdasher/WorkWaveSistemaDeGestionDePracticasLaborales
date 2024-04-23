@extends('pages.AdminEmpresas')

@section('adminempresa')
    <div class="row mt-0 mx-4">
        <div class="col-12">
            <a href="{{url('imprimirEmpresas')}}" target="_blank" class="pull-right">
                <button class="btn btn-success">Imprimir Pdf</button> </a>
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>razon social</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin_empresas as $admin_empresa)
                        <tr>
                            <td class="v-align-middle">{{ $admin_empresa->nombre }}</td>
                            <td class="v-align-middle">{{ $admin_empresa->razon_social }}</td>
                            <td class="v-align-middle">
                                <form action="" method="POST" class="form-horizontal" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="" class="btn btndark">Detalles</a>
                                    <a href="{{ route('admin-empresas.edit', $admin_empresa->id_empresa) }}"
                                        class="btn btnprimary">Editar</a>
                                    <a href=""
                                        data-bs-toggle="modal"data-bs-target="#modal-delete-{{ $admin_empresa->id_empresa }}">
                                        <button type="button" class="btn btn-danger"> Eliminar</button>
                                    </a>
                                    <a href="{{ route('admin-empresas.create') }}" class="btn btn-success">Agregar </a>
                                </form>
                            </td>
                        </tr>
                        @include('admin-empresas.form.modal')
                    @endforeach
                </tbody>
            </table>
        </div>
    @endsection
