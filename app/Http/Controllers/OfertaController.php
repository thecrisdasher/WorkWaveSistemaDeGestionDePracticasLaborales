<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\Tipo_cargos;
use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\TipoCargo;
use Session;
use Redirect;
use DB;


class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oferta = Ofertas::paginate(4);
        return view('oferta.index', compact('oferta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposCargos = TipoCargo::all(); // Obtén todos los cargos desde la tabla tipo_cargos
        return view('oferta.createoferta', compact('tiposCargos'));
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
        $oferta = new Ofertas;
        // Recibo todos los datos del formulario de la vista
        $oferta->nombre_oferta = $request->nombre_oferta;
        $oferta->salario = $request->salario;
        $oferta->descripcion = $request->descripcion;
        $oferta->id_tipo_cargo = $request->tipoCargo;
        $oferta->id_tipo_contrato = 1; //practicante siempre
        $oferta->id_empresa = 1;
        $oferta->id_ubicacion = 1;

        // Almacenos la imagen en la carpeta publica especifica,
        // Guardamos la fecha de creación del registro
        //$oferta->created_at = (new DateTime)->getTimestamp();
        // Inserto todos los datos en mi tabla 'productos'
        $oferta->save();
        // Hago una redirección a la vista principal con un mensaje
        return redirect('oferta')->with('message', 'Oferta Guardado
        Satisfactoriamente !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function show($id_oferta)
    {
        // Obtener la oferta actual
        $oferta = Ofertas::find($id_oferta);

        // Obtener otras ofertas (puedes modificar la lógica según tus necesidades)
        $otras_ofertas = Ofertas::where('id_oferta', '!=', $id_oferta) // Excluir la oferta actual
            ->take(5) // Puedes ajustar la cantidad de ofertas mostradas
            ->get();


        // Obtener otras ofertas (puedes modificar la lógica según tus necesidades)
        $todas_ofertas = Ofertas::where('id_oferta', '!=', $id_oferta) // Excluir la oferta actual
            ->take(5) // Puedes ajustar la cantidad de ofertas mostradas
            ->get();

        // Pasar tanto la oferta actual como las otras ofertas a la vista
        return view('oferta.show', compact('oferta', 'otras_ofertas', 'todas_ofertas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function edit($id_oferta)
    {
        $tiposCargos = Tipo_cargos::all(); // Asumiendo que los tipos de cargo están en una tabla llamada tipo_cargos
        $oferta = Ofertas::find($id_oferta);
        return view('oferta.edit', compact('oferta'), compact('tiposCargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_oferta)
    {

        $oferta = Ofertas::find($id_oferta);
        $oferta->nombre_oferta = $request->nombre_oferta;
        $oferta->salario = $request->salario;
        $oferta->descripcion = $request->descripcion;
        $oferta->id_tipo_cargo = $request->tipoCargo;
        $oferta->id_tipo_contrato = 1; //practicante siempre
        $oferta->id_empresa = 1;
        $oferta->id_ubicacion = 1;


        // Actualizo los datos en la tabla 'productos'
        $oferta->save();
        // Muestro un mensaje y redirecciono a la vista principal
        Session::flash('message', 'Editado Satisfactoriamente !');
        return Redirect::to('oferta');
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
    public function busqueda()
    {

        // Obtén todas las ofertas utilizando el modelo Ofertas
        $ofertas = Ofertas::paginate(4);

        // Devuelve la vista 'busqueda-realizada' con las ofertas
        return view('busqueda.busqueda-realizada', compact('ofertas'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_oferta
     * @return \Illuminate\Http\Response
     */
    public function detalleOferta($id_oferta)
    {
        $oferta = Ofertas::with('empresa', 'ubicacion')->findOrFail($id_oferta);

        return response()->json($oferta);
    }

    public function postularme(Request $request, $id_oferta)
    {
        $id_usuario = auth()->id(); // Obtener el ID del usuario autenticado

        // Verificar si el usuario ya se postuló a la oferta
        $yaPostulado = DB::table('solicitudes')
            ->where('id_postulante', $id_usuario)
            ->where('id_oferta', $id_oferta)
            ->exists();

        if ($yaPostulado) {
            // Si el usuario ya se postuló, retornar un mensaje indicando esto
            return response()->json(['message' => 'Ya te has postulado a esta oferta'], 400);
        }

        // Lógica para guardar la postulación (solo si no está postulada)
        DB::table('solicitudes')->insert([
            'id_hojadevida' => 2,  // Este valor debe ser reemplazado con el correcto
            'id_postulante' => $id_usuario,
            'id_estadosolicitud' => 2,  // Estado 2 puede significar "Pendiente"
            'id_oferta' => $id_oferta,
            'fecha_solicitud' => now(),
        ]);

        // Retorna el mensaje de postulación exitosa
        return response()->json(['message' => 'Postulación exitosa'], 200);
    }




    public function showofertas($id)
    {
        $oferta = Oferta::findOrFail($id);

        // Obtener otras ofertas (puedes cambiar el criterio de búsqueda según lo necesites)
        $otras_ofertas = Oferta::where('id_oferta', '!=', $id) // No mostrar la misma oferta
            ->take(5) // Mostrar un máximo de 5 ofertas
            ->get();

        return view('oferta.show', compact('oferta', 'otras_ofertas'));
    }
}
