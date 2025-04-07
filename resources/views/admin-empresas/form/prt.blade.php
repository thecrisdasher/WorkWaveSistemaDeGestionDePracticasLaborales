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
    <label for="razon_social" class="negrita">Razón Social:</label>
    <div>
        <textarea class="form-control" style="height: 130px; resize: none;" 
                  placeholder="{{ isset($admin_empresas) ? $admin_empresas->razon_social : 'Empresa dedicada a...' }}" 
                  required="required" 
                  name="razon_social" 
                  id="razon_social" 
                  oninput="autoResize(this)">
            {{ old('razon_social', isset($admin_empresas) ? $admin_empresas->razon_social : '') }}
        </textarea>
    </div>
</div>

<script>
    // Función para ajustar dinámicamente el tamaño del textarea
    function autoResize(textarea) {
        textarea.style.height = 'auto';  // Reseteamos la altura
        textarea.style.height = (textarea.scrollHeight) + 'px';  // Establecemos la nueva altura
    }
</script>






                <div class="mb-3">
                    <label for="razon_social" class="negrita">Tipo empresa:</label>
                    <div>
                        <input class="form-control" 
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->tipo_empresa : 'Empresa dedicada a...' }}"
                            required="required"
                            name="tipo_empresa"
                            type="text"
                            id="tipo_empresa"
                            value="{{ old('Razon social', isset($admin_empresas) ? $admin_empresas->tipo_empresa : '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="razon_social" class="negrita">Nit:</label>
                    <div>
                        <input class="form-control" 
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->nit : 'Empresa dedicada a...' }}"
                            required="required"
                            name="nit"
                            type="text"
                            id="nit"
                            value="{{ old('Razon social', isset($admin_empresas) ? $admin_empresas->nit : '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="razon_social" class="negrita">Correo:</label>
                    <div>
                        <input class="form-control" 
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->correo : 'Empresa dedicada a...' }}"
                            required="required"
                            name="correo"
                            type="text"
                            id="correo"
                            value="{{ old('Razon social', isset($admin_empresas) ? $admin_empresas->correo : '') }}">
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