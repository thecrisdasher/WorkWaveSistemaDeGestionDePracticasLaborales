<div class="row mt-0 mx-4">
    <div class="col-md-12">
        <section class="panel " style="width: 100%; overflow-x:hidden;">
            <div class="panel-body">
                <div class="mb-3">
                    <label for="nombre" class="negrita">Nombre:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($oferta) ? $oferta->nombre_oferta : 'Portatil Lenovo' }}"
                            required="required"
                            name="nombre_oferta"
                            type="text"
                            id="nombre"
                            value="{{ old('nombre_oferta', isset($oferta) ? $oferta->nombre_oferta : '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="salario" class="negrita">Salario:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($oferta) ? $oferta->salario : '5000' }}"
                            required="required"
                            name="salario"
                            type="number"
                            id="salario"
                            value="{{ old('salario', isset($oferta) ? $oferta->salario : '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="negrita">Descripción:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($oferta) ? $oferta->descripcion : 'Descripción de la empre' }}"
                            required="required"
                            name="descripcion"
                            type="text"
                            id="descripcion"
                            value="{{ old('descripcion', isset($oferta) ? $oferta->descripcion : '') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tipoCargo" class="negrita">Cargo:</label>
                    <div>
                        <select class="form-control" name="tipoCargo" id="tipoCargo" required="required">
                            @foreach ($tiposCargos as $tiposCargo)
                            <option value="{{ $tiposCargo->id_cargo }}"
                                {{ old('tipoCargo', isset($oferta) && $oferta->tipoCargo == $tiposCargo->id_cargo ? 'selected' : '') }}>
                                {{ $tiposCargo->cargo }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Botón dinámico -->
                <button type="submit" class="btn btn-info">
                    {{ isset($oferta) ? 'Actualizar' : 'Agregar' }}
                </button>
                <a href="/oferta" class="btn btn-warning">Cancelar</a>

            </div>
        </section>
    </div>
</div>