<div class="row">
    <div class="col-md-12">
        <section class="panel">
            <div class="panel-body">
                @if (!empty($users_admin->id))
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombre De Usuario:</label>
                        <div>
                            <input class="form-control" placeholder=" " required="required" name="username"
                                type="text" id="nombre" value="{{ $users_admin->username }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Nombres:</label>
                        <div>
                            <input class="form-control" placeholder=" " required="required" name="firstname"
                                type="text" id="nombre" value="{{ $users_admin->firstname }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Apellidos:</label>
                        <div>
                            <input class="form-control" placeholder=" " required="required" name="lastname"
                                type="text" id="nombre" value="{{ $users_admin->lastname }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="negrita">Email:</label>
                        <div>
                            <input class="form-control" placeholder=" " required="required" name="email"
                                type="text" id="nombre" value="{{ $users_admin->email }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="negrita">Ciudad:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="city"
                                type="text" id="razon_social" value="{{ $users_admin->city }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="negrita">Postal:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="postal"
                                type="text" id="razon_social" value="{{ $users_admin->postal }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="razon_social" class="negrita">Sobre:</label>
                        <div>
                            <input class="form-control" placeholder="" required="required" name="about"
                                type="text" id="razon_social" value="{{ $users_admin->about }}">
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
