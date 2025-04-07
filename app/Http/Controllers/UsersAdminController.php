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
        try {
            // Validar los datos del formulario
            $validatedData = $request->validate([
                'username' => 'required|max:255|unique:users',
                'id_rol' => 'required|max:255',
                'firstname' => 'required|max:100',
                'lastname' => 'required|max:100',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed', // Validación para la contraseña
                'city' => 'nullable|max:100',
                'postal' => 'nullable|max:20',
                'about' => 'nullable|max:255',
            ]);

            // Crear un nuevo usuario
            $users_admin = new User;
            $users_admin->username = $validatedData['username'];
            $users_admin->id_rol = $validatedData['id_rol'];
            $users_admin->firstname = $validatedData['firstname'];
            $users_admin->lastname = $validatedData['lastname'];
            $users_admin->email = $validatedData['email'];
            $users_admin->password = $validatedData['password']; // El mutador en el modelo se encargará de cifrarla
            $users_admin->city = $validatedData['city'];
            $users_admin->postal = $validatedData['postal'];
            $users_admin->about = $validatedData['about'];

            // Guardar el usuario en la base de datos
            $users_admin->save();
            // Redirigir con un mensaje de éxito
            return redirect('admin-users')->with('message', 'Usuario guardado satisfactoriamente!');
        } catch (\Exception $e) {
            // Captura el error y redirige con el mensaje
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
        $users_admin->postal = $request->postal;
        $users_admin->about = $request->about;

        if ($request->filled('password')) {
            $users_admin->password = $request->password; // El mutador en el modelo se encargará de cifrarla
        }

        // Actualizo los datos en la tabla 'usuarios'
        $users_admin->save();
        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Editado Satisfactoriamente !');
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
