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
                            oninput="autoResize(this); checkCharacterLimit(this, 200);">
                        {{ old('razon_social', isset($admin_empresas) ? $admin_empresas->razon_social : '') }}
                        </textarea>
                        <small id="word-limit-message" class="text-danger" style="display: none;">Has excedido el límite de 200 palabras.</small>
                    </div>
                </div>
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
<script>
            // Función para ajustar dinámicamente el tamaño del textarea
            function autoResize(textarea) {
                textarea.style.height = 'auto'; // Reseteamos la altura
                textarea.style.height = (textarea.scrollHeight) + 'px'; // Establecemos la nueva altura
            }

            // Función para verificar el límite de palabras
            function checkWordLimit(textarea, limit) {
                const wordLimitMessage = document.getElementById('word-limit-message');
                const words = textarea.value.trim().split(/\s+/); // Dividimos el texto en palabras
                if (words.length > limit) {
                    wordLimitMessage.style.display = 'block'; // Mostramos el mensaje de error
                } else {
                    wordLimitMessage.style.display = 'none'; // Ocultamos el mensaje de error
                }
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