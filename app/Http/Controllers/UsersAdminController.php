<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Postulante;
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
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users,username', // Validación para evitar duplicados
            'id_rol' => 'required|exists:roles,id_rol',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'city' => 'nullable|string|max:255',
            'about' => 'nullable|string|max:500',
            'carrera' => 'nullable|string|max:255',
            'facultad' => 'nullable|string|max:255',
        ]);

        // Crear un nuevo usuario con los datos validados
        $users_admin = new User;
        $users_admin->username = $validatedData['username'];
        $users_admin->id_rol = $validatedData['id_rol'];
        $users_admin->firstname = $validatedData['firstname'];
        $users_admin->lastname = $validatedData['lastname'];
        $users_admin->email = $validatedData['email'];
        $users_admin->city = $validatedData['city'] ?? null;
        $users_admin->postal = 1; // Valor predeterminado
        $users_admin->about = $validatedData['about'] ?? null;
        $users_admin->carrera = $validatedData['carrera'] ?? 'No estudiante';
        $users_admin->facultad = $validatedData['facultad'] ?? 'No estudiante';
        $users_admin->password = $validatedData['password']; // Encriptar la contraseña

        // Guardar el usuario
        $users_admin->save();

        // Si el rol es "estudiante", crear un registro en la tabla `postulantes`
        if ($users_admin->id_rol == 2) { // Suponiendo que el rol de estudiante tiene el ID 2
            Postulante::create([
                'id_postulante' => $users_admin->id, // Usar el ID del usuario recién creado
                'nombre' => $users_admin->firstname,
                'apellido' => $users_admin->lastname,
                'fecha_nacimiento' => null, // Asignar un valor por defecto o null
                'id' => $users_admin->id, // Relación con la tabla `users`
            ]);
        }

        // Redirigir con un mensaje de éxito
        return redirect('admin-users')->with('message', 'Usuario y postulante creados satisfactoriamente!');
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
