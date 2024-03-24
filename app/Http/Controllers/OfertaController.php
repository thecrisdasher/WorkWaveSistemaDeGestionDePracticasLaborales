<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use Session;
use Redirect;


class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oferta = Oferta::all();
        return view('oferta.index', compact('oferta'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('oferta.createoferta');
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
        $oferta = new Oferta;
        // Recibo todos los datos del formulario de la vista
        $oferta->nombre = $request->nombre;
        $oferta->salario = $request->salario;
        $oferta->descripcion = $request->descripcion;

        // Almacenos la imagen en la carpeta publica especifica,
        // Guardamos la fecha de creación del registro
        //$oferta->created_at = (new DateTime)->getTimestamp();
        // Inserto todos los datos en mi tabla 'productos'
        $oferta->save();
        // Hago una redirección a la vista principal con un mensaje
        return redirect('oferta')->with('message','Oferta Guardado
        Satisfactoriamente !');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $oferta  =  Oferta::all();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oferta = Oferta::find($id);
        return view('oferta.edit', compact('oferta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $oferta = Oferta::find($id);
        $oferta->nombre = $request->nombre;
        $oferta->salario = $request->salario;
        $oferta->descripcion = $request->descripcion;


        // Actualizo los datos en la tabla 'productos'
        $oferta->save();
        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('oferta');

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
$oferta = Oferta::find($id);
// Elimino la imagen de la carpeta 'uploads'


// Elimino el registro de la tabla 'productos'
Oferta::destroy($id);
// Opcional: Si deseas guardar la fecha de eliminación de un registro, debes
// $productos->deleted_at = (new DateTime)->getTimestamp();

// Muestro un mensaje y redirecciono a la vista principal
Session::flash('message', 'Eliminado Satisfactoriamente !');
return Redirect::to('oferta');
    }
}
