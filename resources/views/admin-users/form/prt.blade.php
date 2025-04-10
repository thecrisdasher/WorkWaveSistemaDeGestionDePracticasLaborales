<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                <div class="mb-3">
                    <label for="username" class="negrita">Nombre De Usuario:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->username  : 'casol' }}"
                            required="required"
                            name="username"
                            type="text"
                            id="username"
                            value="{{ old('username', isset($users_admin) ?  $users_admin->username  : '') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="id_rol" class="negrita">Rol:</label>
                    <div>
                        <select class="form-control" name="id_rol" id="id_rol" required="required">
                            <option value="1" {{ isset($users_admin) && $users_admin->id_rol == 1 ? 'selected' : '' }}>Administrador</option>
                            <option value="2" {{ isset($users_admin) && $users_admin->id_rol == 2 ? 'selected' : '' }}>Estudiante</option>
                            <option value="3" {{ isset($users_admin) && $users_admin->id_rol == 3 ? 'selected' : '' }}>Empresa</option>
                        </select>
                        @error('id_rol')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="firstname" class="negrita">Nombres:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->firstname  : 'Camilo' }}"
                            required="required"
                            name="firstname"
                            type="text"
                            id="firstname"
                            value="{{ old('firstname', isset($users_admin) ?  $users_admin->firstname  : '') }}">
                        @error('firstname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="negrita">Apellidos:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->lastname  : 'Pere pe' }}"
                            required="required"
                            name="lastname"
                            type="text"
                            id="lastname"
                            value="{{ old('lastname', isset($users_admin) ?  $users_admin->lastname  : '') }}">
                        @error('lastname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="negrita">Email:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->email  : 'example@example.com' }}"
                            required="required"
                            name="email"
                            type="text"
                            id="email"
                            value="{{ old('email', isset($users_admin) ?  $users_admin->email  : '') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="city" class="negrita">Ciudad:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->city  : 'Cali' }}"
                            required="required"
                            name="city"
                            type="text"
                            id="city"
                            value="{{ old('city', isset($users_admin) ?  $users_admin->city  : '') }}">
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="postal" class="negrita">Postal:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->postal  : '52153' }}"
                            required="required"
                            name="postal"
                            type="text"
                            id="postal"
                            value="{{ old('postal', isset($users_admin) ?  $users_admin->postal  : '') }}">
                        @error('postal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="about" class="negrita">Sobre mi:</label>
                    <div>
                        <textarea 
                        style="resize: none; overflow-y: hidden;"
                        class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->about  : '' }}"
                            required="required"
                            name="about"
                            type="text"
                            id="about"
                            value="{{ old('about', isset($users_admin) ?  $users_admin->about  : '') }}"
                            oninput="autoResize(this); checkCharacterLimit(this, 500);">
                            {{ old('about', isset($users_admin) ?  $users_admin->about  : '') }}
                        </textarea>
                        @error('about')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3" id="facultad-field" style="display: none;">
                    <label for="facultad" class="negrita">Facultad:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->facultad  : '' }}"
                            name="facultad"
                            type="text"
                            id="facultad"
                            value="{{ old('facultad', isset($users_admin) ?  $users_admin->facultad  : '') }}">
                        @error('facultad')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3" id="carrera-field" style="display: none;">
                    <label for="carrera" class="negrita">Carrera:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->carrera  : '' }}"
                            name="carrera"
                            type="text"
                            id="carrera"
                            value="{{ old('carrera', isset($users_admin) ?  $users_admin->carrera  : '') }}">
                        @error('carrera')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Campos para la contraseña -->
                <div class="mb-3">
                    <label for="password" class="negrita">Contraseña:</label>
                    <div>
                        <input class="form-control"
                            placeholder="Ingrese una contraseña"
                            {{ isset($users_admin) ? '' : 'required="required"' }}
                            name="password"
                            type="password"
                            id="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="negrita">Confirmar Contraseña:</label>
                    <div>
                        <input class="form-control"
                            placeholder="Confirme la contraseña"
                            {{ isset($users_admin) ? '' : 'required="required"' }}
                            name="password_confirmation"
                            type="password"
                            id="password_confirmation">
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Botón dinámico -->
                <button type="submit" class="btn btn-info">
                    {{ isset($users_admin) ? 'Actualizar' : 'Agregar' }}
                </button>
                <a href="/admin-users" class="btn btn-warning">Cancelar</a>
            </div>
        </section>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const idRolSelect = document.getElementById('id_rol');
        const facultadField = document.getElementById('facultad-field');
        const carreraField = document.getElementById('carrera-field');

        function toggleFields() {
            if (idRolSelect.value === '2') { // Si el rol es "Estudiante"
                facultadField.style.display = 'block';
                carreraField.style.display = 'block';
            } else {
                facultadField.style.display = 'none';
                carreraField.style.display = 'none';
            }
        }

        // Inicializar los campos al cargar la página
        toggleFields();

        // Escuchar cambios en el select de roles
        idRolSelect.addEventListener('change', toggleFields);
    });
</script>
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