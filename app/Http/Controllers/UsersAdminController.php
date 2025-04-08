<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Redirect;

class UsersAdminController extends Controller
{
    public function index()
    {
        $users_admin = User::paginate(4);
        return view('admin-users.admin-user', compact('users_admin'));
    }

    public function create()
    {

        return view('admin-users.create-user');
    }

    public function edit($id)
    {
        $users_admin = User::find($id);
        return view('admin-users.edit', compact('users_admin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Crear un nuevo usuario
        $users_admin = new User;
        $users_admin->username = $request->username;
        $users_admin->id_rol = $request->id_rol;
        $users_admin->firstname = $request->firstname;
        $users_admin->lastname = $request->lastname;
        $users_admin->email = $request->email;
        $users_admin->city = $request->city;
        $users_admin->postal = 1;
        $users_admin->about = $request->about;

        // Asignar valores por defecto si no se proporcionan
        $users_admin->carrera = $request->carrera ?? 'No estudiante';
        $users_admin->facultad = $request->facultad ?? 'No estudiante';

        // Guardar el usuario
        $users_admin->save();

        // Redirigir con un mensaje de éxito
        return redirect('admin-empresas')->with('message', 'Usuario guardado satisfactoriamente!');
    }

    public function update(Request $request, $id)
    {
        $users_admin = User::find($id);
        $users_admin->username = $request->username;
        $users_admin->id_rol = $request->id_rol;
        $users_admin->firstname = $request->firstname;
        $users_admin->lastname = $request->lastname;
        $users_admin->email = $request->email;
        $users_admin->city = $request->city;
        $users_admin->postal = 1;
        $users_admin->about = $request->about;

        // Asignar valores por defecto si no se proporcionan
        $users_admin->carrera = $request->carrera ?? 'No estudiante';
        $users_admin->facultad = $request->facultad ?? 'No estudiante';

        if ($request->filled('password')) {
            $users_admin->password = $request->password; // Actualiza la contraseña solo si se proporciona
        }

        // Guardar los cambios
        $users_admin->save();

        // Redirigir con un mensaje de éxito
        Session::flash('message', 'Editado satisfactoriamente!');
        return Redirect::to('admin-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Buscar el usuario
            $users_admin = User::find($id);

            // Eliminar los registros relacionados en la tabla 'empresas'
            $users_admin->empresas()->delete(); // Asegúrate de tener una relación definida en el modelo User

            // Eliminar el usuario
            $users_admin->delete();

            // Mostrar un mensaje y redirigir
            Session::flash('message', 'Eliminado Satisfactoriamente!');
            return Redirect::to('admin-users');
        } catch (\Exception $e) {
            // Capturar errores y redirigir con mensaje
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
