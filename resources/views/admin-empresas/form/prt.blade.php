<div class="row mt-0 mx-4">
    <div class="col-md-12">
        <section class="panel " style="width: 100%; overflow-x:hidden;">
            <div class="panel-body">
                <div class="mb-3">
                    <label for="nombre" class="negrita">Nombre:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($admin_empresas) ?  $admin_empresas->nombre  : 'Apple' }}"
                            required="required"
                            name="nombre"
                            type="text"
                            id="nombre"
                            value="{{ old('nombre empresa', isset($admin_empresas) ?  $admin_empresas->nombre  : '') }}">
                    </div>
                </div>


                <div class="mb-3">
                    <label for="razon_social" class="negrita">Razon Social:</label>
                    <div>
                        <input class="form-control" style="height: 130px;"
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->razon_social : 'Empresa dedicada a...' }}"
                            required="required"
                            name="razon_social"
                            type="text"
                            id="razon_social"
                            value="{{ old('Razon social', isset($admin_empresas) ? $admin_empresas->razon_social : '') }}">
                    </div>
                </div>


            </div>
    </div>


    <!-- Botón dinámico -->
    <button type=" submit" class="btn btn-info">
        {{ isset($admin_empresas) ? 'Actualizar' : 'Agregar' }}
    </button>
    <a href="/admin-empresas" class="btn btn-warning">Cancelar</a>

</div>
</section>
</div>
</div>