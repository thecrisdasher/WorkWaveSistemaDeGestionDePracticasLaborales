<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if (!empty($users_admin->id))
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder=" " required="required" name="nombre"
                                type="text" id="nombre" value="{{ $users_admin->username }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="negrita">Razon Social:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="razon_social"
                                type="text" id="razon_social" value="{{ $users_admin->razon_social }}">
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="nombre"
                                type="text" id="nombre">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="negrita">Razon Social:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="razon_social"
                                type="text" id="razon_social">
                        </div>
                    </div>
                @endif
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href="" class="btn btn-warning">Cancelar</a>
                <br>
                <br>
            </div>
        </section>
    </div>
</div>
