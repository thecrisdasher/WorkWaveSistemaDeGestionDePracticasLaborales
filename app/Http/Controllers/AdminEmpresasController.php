<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;
use Session;
use Redirect;

class AdminEmpresasController extends Controller
{
    public function index()
    {
        $admin_empresas = Empresas::all();
        return view('admin-empresas.admin-empresa', compact('admin_empresas'));

    }
    public function create()
    {

        return view('admin-empresas.create-empresa');
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
        $admin_empresas = new Empresas;
        // Recibo todos los datos del formulario de la vista
        $admin_empresas->nombre = $request->nombre;
        $admin_empresas->razon_social = $request->razon_social;
        $admin_empresas->id_usuario = 1;
        $admin_empresas->id_ubicacion = 1;

        // Almacenos la imagen en la carpeta publica especifica,
        // Guardamos la fecha de creación del registro
        //$oferta->created_at = (new DateTime)->getTimestamp();
        // Inserto todos los datos en mi tabla 'productos'
        $admin_empresas->save();
        // Hago una redirección a la vista principal con un mensaje
        return redirect('admin-empresas')->with('message', 'Empresa Guardada
        Satisfactoriamente !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_empresa
     * @return \Illuminate\Http\Response
     */
    public function show($id_empresa)
    {
        $id_empresa = Empresas::all();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id_empresa)
    {
        $admin_empresas = Empresas::find($id_empresa);
        return view('admin-empresas.edit', compact('admin_empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $admin_empresas)
    {
        $oferta = Empresas::find($admin_empresas);
        $admin_empresas->nombre = $request->nombre;
        $admin_empresas->razon_social = $request->razon_social;
        $admin_empresas->id_usuario = 1;
        $admin_empresas->id_ubicacion = 1;

        // Actualizo los datos en la tabla 'productos'
        $oferta->save();
        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin-empresas');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_oferta)
    {
        // Indicamos el 'id' del registro que se va Eliminar
        $oferta = Ofertas::find($id_oferta);
        // Elimino la imagen de la carpeta 'uploads'


        // Elimino el registro de la tabla 'productos'
        Ofertas::destroy($id_oferta);
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes
// $productos->deleted_at = (new DateTime)->getTimestamp();

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('oferta');
    }

}
