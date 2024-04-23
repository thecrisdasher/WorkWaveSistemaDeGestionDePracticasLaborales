<div class="row mt-0 mx-4">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if (!empty($oferta->id))
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Portatil Lenovo" required="required" name="nombre"
                                type="text" id="nombre" value="{{ $oferta->nombre }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="negrita">Salario:</label>
                        <div>
                            <input class="form-control" placeholder="5000" required="required" name="salario"
                                type="text" id="precio" value="{{ $oferta->salario }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="negrita">Descripcion:</label>
                        <div>
                            <input class="form-control" placeholder="40" required="required" name="descripcion"
                                type="text" id="stock" value="{{ $oferta->descripcion }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="negrita">Cargo:</label>
                        <div>
                            <input class="form-control" placeholder="40" required="required" name="descripcion"
                                type="text" id="stock" value="{{ $oferta->cargo }}">
                        </div>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre:</label>
                        <div>
                            <input class="form-control" placeholder="Portatil Lenovo"
                                required="required" name="nombre_oferta" type="text" id="nombre">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="negrita">Salario:</label>
                        <div>
                            <input class="form-control" placeholder="5000" required="required" name="salario"
                                type="text" id="salario">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="negrita">Descripción:</label>
                        <div>
                            <input class="form-control" placeholder="40" required="required" name="descripcion"
                                type="text" id="descripcion">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="stock" class="negrita">Cargo:</label>
                        <div>
                            <input class="form-control" placeholder="40" required="required" name="tipoCargo"
                                type="text" id="tipoCargo">
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
