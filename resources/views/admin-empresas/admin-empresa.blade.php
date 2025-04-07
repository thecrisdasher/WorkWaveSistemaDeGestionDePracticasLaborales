@extends('pages.AdminEmpresas')

@section('adminempresa')
<div class="row mt-0 mx-4">



    <a href="{{ route('admin-empresas.create') }}" class="btn btn-success mt-4 ml-3 mb-4 " style="width: 300px;">Agregar empresa</a>
    <!-- Campo de búsqueda -->
      <!-- Campo de búsqueda -->
      <div class="mb-3">
                    <label for="filter-nombre" class="form-label">Filtrar por caracter:</label>
                    <input type="text" id="filter-nombre" class="form-control" placeholder="Buscar por caracter..." style="width: 300px;">
                </div>


    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Razón Social</th>
                <th>tipo empresa</th>
                <th>nit</th>
                <th>correo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($admin_empresas as $admin_empresa)
            <tr>
                <td class="v-align-middle">{{ $admin_empresa->nombre }}</td>
                <td class="v-align-middle">{{ $admin_empresa->razon_social }}</td>
                <td class="v-align-middle">{{ $admin_empresa->tipo_empresa }}</td>
                <td class="v-align-middle">{{ $admin_empresa->nit }}</td>
                <td class="v-align-middle">{{ $admin_empresa->correo }}</td>
                <td class="v-align-middle">
                    <form action="" method="POST" class="form-horizontal" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('admin-empresas.edit', $admin_empresa->id_empresa) }}"
                            class="btn btn-info" style="width: 100px;">Editar</a>
                        <a href=""
                            data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $admin_empresa->id_empresa }}">
                            <button type="button" style="width: 100px;" class="btn btn-danger">Eliminar</button>
                        </a>
                    </form>
                </td>
            </tr>
            @include('admin-empresas.form.modal')
            @endforeach
        </tbody>
    </table>
    <div style="width: 90%; display: flex;
    justify-content: center;" class="container-busqueda mt-3 mx-5 d-flex justify-content ">
        <div>
            {!! $admin_empresas->links() !!}
        </div>
    </div>
</div>

<script>
    // Filtro dinámico por nombre
    document.getElementById('filter-nombre').addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        const rows = document.querySelectorAll('#table-body tr');

        rows.forEach(row => {
            const nombre = row.querySelector('td:first-child').textContent.toLowerCase();
            row.style.display = nombre.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection