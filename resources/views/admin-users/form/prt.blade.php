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
                            value="{{ old('nombre de usuario', isset($users_admin) ?  $users_admin->username  : '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="id_rol" class="negrita">ID rol:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->id_rol  : '1, 2, 3' }}"
                            required="required"
                            name="id_rol"
                            type="text"
                            id="id_rol"
                            value="{{ old('id rol', isset($users_admin) ?  $users_admin->id_rol  : '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="negrita">Nombres:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->firstname  : 'Camilo' }}"
                            required="required"
                            name="firstname"
                            type="text"
                            id="nombre"
                            value="{{ old('nombres', isset($users_admin) ?  $users_admin->firstname  : '') }}">
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
                            value="{{ old('Apellidos', isset($users_admin) ?  $users_admin->lastname  : '') }}">
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
                            value="{{ old('nombre de usuario', isset($users_admin) ?  $users_admin->email  : '') }}">
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
                            value="{{ old('Ciudad', isset($users_admin) ?  $users_admin->city  : '') }}">
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
                            value="{{ old('Codigo postal', isset($users_admin) ?  $users_admin->postal  : '') }}">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="about" class="negrita">Sobre:</label>
                    <div>
                        <input class="form-control"
                            placeholder="{{ isset($users_admin) ?  $users_admin->about  : '' }}"
                            required="required"
                            name="about"
                            type="text"
                            id="about"
                            value="{{ old('Sobre mi', isset($users_admin) ?  $users_admin->about  : '') }}">
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