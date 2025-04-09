<div class="row mt-0 mx-4">
    <div class="col-md-12">
        <section class="panel" style="width: 100%; overflow-x:hidden;">
            <div class="panel-body">
                <div class="mb-3">
                    <label for="nombre" class="negrita">Nombre:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->nombre : 'Apple' }}"
                            required="required"
                            name="nombre"
                            type="text"
                            id="nombre"
                            value="{{ old('nombre', isset($admin_empresas) ? $admin_empresas->nombre : '') }}">
                        @error('nombre')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="razon_social" class="negrita">Razón Social:</label>
                    <div>
                        <textarea class="form-control" style="height: 130px; resize: none; overflow-y: hidden;"
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->razon_social : 'Empresa dedicada a...' }}"
                            required="required"
                            name="razon_social"
                            id="razon_social"
                            oninput="autoResize(this); checkCharacterLimit(this, 200);">
                        {{ old('razon_social', isset($admin_empresas) ? $admin_empresas->razon_social : '') }}
                        </textarea>
                        @error('razon_social')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <small id="word-limit-message" class="text-danger" style="display: none;">Has excedido el límite de 200 palabras.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="tipo_empresa" class="negrita">Tipo de Empresa:</label>
                    <div>
                        <select class="form-control" name="tipo_empresa" id="tipo_empresa" required="required">
                            <option value="" disabled {{ !isset($admin_empresas) ? 'selected' : '' }}>Seleccione el tipo de empresa</option>
                            <option value="Tecnología" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Tecnología' ? 'selected' : '' }}>Tecnología</option>
                            <option value="Salud" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Salud' ? 'selected' : '' }}>Salud</option>
                            <option value="Educación" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Educación' ? 'selected' : '' }}>Educación</option>
                            <option value="Finanzas" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Finanzas' ? 'selected' : '' }}>Finanzas</option>
                            <option value="Manufactura" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Manufactura' ? 'selected' : '' }}>Manufactura</option>
                            <option value="Otro" {{ isset($admin_empresas) && $admin_empresas->tipo_empresa == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </select>
                        @error('tipo_empresa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nit" class="negrita">Nit:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->nit : '123456789' }}"
                            required="required"
                            name="nit"
                            type="text"
                            id="nit"
                            value="{{ old('nit', isset($admin_empresas) ? $admin_empresas->nit : '') }}">
                        @error('nit')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="correo" class="negrita">Correo:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($admin_empresas) ? $admin_empresas->correo : 'empresa@example.com' }}"
                            required="required"
                            name="correo"
                            type="text"
                            id="correo"
                            value="{{ old('correo', isset($admin_empresas) ? $admin_empresas->correo : '') }}">
                        @error('correo')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
    </div>

    <!-- Botón dinámico -->
    <button type="submit" class="btn btn-info">
        {{ isset($admin_empresas) ? 'Actualizar' : 'Agregar' }}
    </button>
    <a href="/admin-users" class="btn btn-warning">Cancelar</a>
</div>

<script>
    // Función para ajustar dinámicamente el tamaño del textarea
    function autoResize(textarea) {
        textarea.style.height = 'auto'; // Reseteamos la altura
        textarea.style.height = (textarea.scrollHeight) + 'px'; // Establecemos la nueva altura
    }

    // Función para verificar el límite de caracteres
    function checkCharacterLimit(textarea, limit) {
        const charLimitMessage = document.getElementById('char-limit-message');
        const currentLength = textarea.value.length; // Longitud actual del texto
        if (currentLength > limit) {
            charLimitMessage.style.display = 'block'; // Mostramos el mensaje de error
        } else {
            charLimitMessage.style.display = 'none'; // Ocultamos el mensaje de error
        }
    }
</script>
</section>
</div>
</div>