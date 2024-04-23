<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Redirect;

class UsersAdminController extends Controller
{
    public function index(){
        $users_admin = User::all();
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
        // Instancio al modelo Productos que hace llamado a la tabla 'productos'
        $users_admin = new User;
        // Recibo todos los datos del formulario de la vista
        $users_admin->nombre_usuario = $request->nombre_usuario;
        $users_admin->nombre = $request->nombre;
        $users_admin->apellido = $request-> apellido;
        $users_admin->email = $request-> email;
        $users_admin->ciudad = $request->ciudad;
        $users_admin->postal = 1;
        $users_admin->Sobre = 1;

        // Almacenos la imagen en la carpeta publica especifica,
        // Guardamos la fecha de creación del registro
        //$oferta->created_at = (new DateTime)->getTimestamp();
        // Inserto todos los datos en mi tabla 'productos'
        $users_admin->save();
        // Hago una redirección a la vista principal con un mensaje
        return redirect('admin-users')->with('message', 'Usuario Guardada
        Satisfactoriamente !');

    }
    public function update(Request $request, $id)
    {
        $users_admin = User::find($id);
        $users_admin->username = $request->username;
        $users_admin->firstname = $request->firstname;
        $users_admin->lastname = $request-> lastname;
        $users_admin->email = $request-> email;
        $users_admin->city = $request->city;
        $users_admin->postal = 1;
        $users_admin->about = $request->about;


        // Actualizo los datos en la tabla 'productos'
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
        // Indicamos el 'id' del registro que se va Eliminar
        $users_admin = User::find($id);
        // Elimino la imagen de la carpeta 'uploads'


        // Elimino el registro de la tabla 'productos'
        User::destroy($id);
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes
// $productos->deleted_at = (new DateTime)->getTimestamp();

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin-users');
    }

}
