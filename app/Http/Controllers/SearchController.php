<?php

namespace App\Http\Controllers;


use App\Models\Ofertas; // Asegúrate de importar el modelo Ofertas si es necesario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importa DB para usar consultas SQL
use Illuminate\Support\Facades\Response; // Importa Response para devolver respuestas JSON
use Illuminate\Support\Facades\Redirect; // Importa Redirect para redireccionar
use Illuminate\Support\Facades\Session; // Importa Session para manejar sesiones

class SearchController extends Controller
{
    public function show(Request $request){

        $data = trim($request ->valor);
        $result = DB::table("ofertas")
        ->where('nombre_oferta','LIKE','%'.$data.'%')

        ->get();
        return response()->json([
            "estado" =>1,
            "result" => $result
        ]);
    }


}
