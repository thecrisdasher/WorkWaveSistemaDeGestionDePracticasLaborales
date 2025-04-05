@extends('pages.AdminUsers')

@section('adminuser')
<div class="container-fluid col-12 py-4">
    <div class="row mt-0 mx-4">
        <div class="col-12">
            <a href="{{url('imprimirUsers')}}" target="_blank" class="pull-right">
                <a href="{{ route('admin-users.create') }}" class="btn btn-success mt-4 ml-3 mb-4" style="width: 300px;">Agregar usuario</a>

                <!-- Campo de búsqueda -->
                <div class="mb-3">
                    <label for="filter-nombre" class="form-label">Filtrar por Nombre:</label>
                    <input type="text" id="filter-nombre" class="form-control" placeholder="Buscar por nombre..." style="width: 300px;">
                </div>

                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th>Nombre De Usuario</th>
                            <th>Rol</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Ciudad</th>
                            <th>Postal</th>
                            <th>Sobre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="table-body">
                        @foreach ($users_admin as $users_admi)
                        <tr>
                            <td class="v-align-middle">{{ $users_admi->username }}</td>
                            <td class="v-align-middle">{{ $users_admi->id_rol ?? 'Sin rol' }}</td>
                            <td class="v-align-middle">{{ $users_admi->firstname }}</td>
                            <td class="v-align-middle">{{ $users_admi->lastname }}</td>
                            <td class="v-align-middle">{{ $users_admi->email }}</td>
                            <td class="v-align-middle">{{ $users_admi->city }}</td>
                            <td class="v-align-middle">{{ $users_admi->postal }}</td>
                            <td class="v-align-middle">{{ $users_admi->about }}</td>
                            <td class="v-align-middle">
                                <form action="" method="POST" class="form-horizontal" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <a href="{{ route('admin-users.edit', $users_admi->id) }}" class="btn btn-primary">Editar</a>
                                    <a href="{{ route('admin-users.destroy', $users_admi->id) }}" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $users_admi->id }}">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                </form>
                            </td>
                        </tr>
                        @include('admin-users.form.modal')
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
    <div style="width: 90%; display: flex;
    justify-content: center;" class="container-busqueda mt-3 mx-5 d-flex justify-content ">
        <div>
            {!! $users_admin->links() !!}
        </div>
    </div>
</div>

<script>
    // Filtro dinámico por nombre
    document.getElementById('filter-nombre').addEventListener('input', function () {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#table-body tr');

        rows.forEach(row => {
            const nombre = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Filtra por la columna "Nombre"
            row.style.display = nombre.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection