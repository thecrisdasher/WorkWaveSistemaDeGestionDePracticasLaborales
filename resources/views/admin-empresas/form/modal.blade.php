<div class="modal fade" id="modal-delete-{{ $admin_empresa->id_empresa }}" tabindex="-1" arialabelledby="ModalLabel"
    aria-hidden="true">
    <form method="POST" action="{{ route('admin-empresas.destroy', $admin_empresa->id_empresa) }}" role="form"
        enctype="multipart/form-data">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" arialabel="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea Eliminar el producto</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bsdismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
</div>
</form>
