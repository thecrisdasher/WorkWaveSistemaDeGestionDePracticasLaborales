@extends('pages.dashboard')
@section('ofertas')
    <div class="table-responsive p-0">

        <a href="{{ route('oferta.create') }}" class="btn btn-success mt-4 ml-3 mb-4">Agregar </a>
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>nombre</th>
                    <th>fecha</th>
                    <th>salario</th>
                    <th>descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($oferta as $ofert)
                    <tr>
                        <td class="v-align-middle">{{ $ofert->nombre }}</td>
                        <td class="v-align-middle">{{ $ofert->fecha }}</td>
                        <td class="v-align-middle">{{ $ofert->salario }}</td>
                        <td class="v-align-middle">{{ $ofert->descripcion }}</td>
                        <td class="v-align-middle">
                            <form action="" method="POST" class="form-horizontal" role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <a href="{{ route('oferta.show', $ofert->id) }}" class="btn btndark">Detalles</a>
                                <a href="{{ route('oferta.edit', $ofert->id) }}" class="btn btnprimary">Editar</a>
                                <a href="" data-bs-toggle="modal"data-bs-target="#modal-delete-{{ $ofert->id }}">
                                    <button type="button" class="btn btn-danger"> Eliminar</button> </a>
                            </form>
                        </td>
                    </tr>
                    @include('oferta.form.modal')
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
