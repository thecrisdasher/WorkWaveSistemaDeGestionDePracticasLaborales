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
                        <textarea class="form-control" style="height: 130px; resize: none; overflow-y: hidden;"
                            placeholder="{{ isset($oferta) ? $oferta->descripcion : 'Descripción de la empresa' }}"
                            name="descripcion"
                            type="text"
                            id="descripcion"
                            maxlength="450" 
                            oninput="autoResize(this); checkCharacterLimit(this, 450);">
                        {{ old('descripcion', isset($oferta) ? $oferta->descripcion : '') }}
                        </textarea>
                        <small id="char-limit-message" class="text-danger" style="display: none;">Has excedido el límite de 450 caracteres.</small>
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
    </div>
</div>