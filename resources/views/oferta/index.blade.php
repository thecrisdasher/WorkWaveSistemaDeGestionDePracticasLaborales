@extends('pages.Oferta')
@section('ofertas')
<div class="row mt-0 mx-4" style="width: 90%;">
    <a href="{{ route('oferta.create') }}" class="btn btn-success mt-4 ml-3 mb-4" style="width: 300px;">Agregar oferta</a>

       <!-- Campo de búsqueda -->
       <div class="mb-3">
                    <label for="filter-nombre" class="form-label">Filtrar por caracter:</label>
                    <input type="text" id="filter-nombre" class="form-control" placeholder="Buscar por caracter..." style="width: 300px;">
                </div>

    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Salario</th>
                <th>Ubicación</th>
                <th>Empresa</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="table-body">
            @foreach ($oferta as $ofert)
            <tr>
                <td class="v-align-middle text-wrap">{{ $ofert->nombre_oferta }}</td>
                <td class="v-align-middle">{{ $ofert->created_at->format('d/m/Y') }}</td>
                <td class="v-align-middle">{{ $ofert->salario }}</td>
                <td class="v-align-middle">{{ $ofert->Ubicacion->direccion }}</td>
                <td class="v-align-middle">{{ $ofert->Empresa->nombre }}</td>
                <td class="v-align-middle">
                    <form action="" method="POST" class="d-flex flex-column" role="form">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <a href="{{ route('oferta.edit', $ofert->id_oferta) }}" class="btn btn-info" style="width: 100px;">Editar</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#modal-delete-{{ $ofert->id_oferta }}">
                            <button type="button" style="width: 100px;" class="btn btn-danger">Eliminar</button>
                        </a>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class=" container-busqueda mt-3 mx-5 d-flex justify-content" style="width: 90%; display: flex;
    justify-content: center;">
        <div>
            {!! $oferta->links() !!}
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