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
        $admin_empresas = Empresas::paginate(4);
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

        // Valida los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'tipo_empresa' => 'required|string|max:255',
            'nit' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
        ]);

        // Instancio al modelo Empresas que hace llamado a la tabla 'Empresas'
        $admin_empresas = new Empresas;


        // Asigna los valores validados al objeto
        $admin_empresas->id_usuario = 1;
        $admin_empresas->id_ubicacion = 1;
        $admin_empresas->nombre = $validatedData['nombre'];
        $admin_empresas->razon_social = $validatedData['razon_social'];
        $admin_empresas->tipo_empresa = $validatedData['tipo_empresa'];
        $admin_empresas->nit = $validatedData['nit'];
        $admin_empresas->correo = $validatedData['correo'];


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
     * @param  int  $id_empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_empresa)
    {
        // Encuentra el registro existente por su ID


        // Valida los datos del formulario
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'razon_social' => 'required|string|max:255',
            'tipo_empresa' => 'required|string|max:255',
            'nit' => 'required|string|max:20',
            'correo' => 'required|email|max:255',
        ]);


        $admin_empresas = Empresas::find($id_empresa);
        // Actualiza los campos con los datos del formulario

        // Asigna los valores validados al objeto
        $admin_empresas->nombre = $validatedData['nombre'];
        $admin_empresas->razon_social = $validatedData['razon_social'];
        $admin_empresas->tipo_empresa = $validatedData['tipo_empresa'];
        $admin_empresas->nit = $validatedData['nit'];
        $admin_empresas->correo = $validatedData['correo'];

        // Guarda los cambios en la base de datos
        $admin_empresas->save();

        // Redirige con un mensaje de éxito
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('admin-empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_empresa)
    {
        // Indicamos el 'id' del registro que se va Eliminar
        $admin_empresas = Empresas::find($id_empresa);
        // Elimino la imagen de la carpeta 'uploads'


        // Elimino el registro de la tabla 'Empresas'
        Empresas::destroy($id_empresa);
        // Opcional: Si deseas guardar la fecha de eliminación de un registro, debes
        // $Empresas->deleted_at = (new DateTime)->getTimestamp();

        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Eliminado Satisfactoriamente !');
        return Redirect::to('admin-empresas');
    }
}
