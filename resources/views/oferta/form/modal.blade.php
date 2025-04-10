

<div class="modal fade" id="modal-delete-{{ $ofert->id_oferta }}" tabindex="-1" aria-labelledby="ModalLabel"
    aria-hidden="true">
    <form method="POST" action="{{ route('oferta.destroy', $ofert->id_oferta) }}" role="form" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="delete">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar oferta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea eliminar la oferta <strong>{{ $ofert->nombre_oferta }}</strong>.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </form>
</div>
