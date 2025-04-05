<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\Empresas;
use Illuminate\Http\Request;

class EstudiantePrincipalController extends Controller
{
    public function principal(Request $request)
    {
        // Obtener las ofertas basadas en los filtros
        $ofertas = Ofertas::query();

        // Filtro por Fecha de Publicación
        if ($request->filled('fecha_publicacion')) {
            $fecha = $request->fecha_publicacion;
            if ($fecha == 'hoy') {
                $ofertas->whereDate('created_at', today());
            } elseif ($fecha == 'semana') {
                $ofertas->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            } elseif ($fecha == 'mes') {
                $ofertas->whereMonth('created_at', now()->month);
            }
        }

        // Filtro por Cargo
        if ($request->filled('cargo')) {
            $cargo = $request->cargo;
            $ofertas->whereHas('empresa', function($query) use ($cargo) {
                $query->where('nombre', $cargo);
            });
        }

        // Obtener las ofertas filtradas
        $ofertas = $ofertas->get();

        // Si la solicitud es AJAX, devolvemos el fragmento de las ofertas
        if ($request->ajax()) {
            if ($ofertas->isEmpty()) {
                return response()->json(['message' => 'No hay ofertas disponibles.']);
            }
            return view('partials.ofertas-list', compact('ofertas'));
        }


        
        // Devolver la vista principal con las ofertas
        $empresas = Empresas::all();
        return view('principal-window-user.principal-window-student', compact('ofertas', 'empresas'));
    }

    public function index()
    {
       
        $empresas = Empresas::all(); 
        $ofertas = Ofertas::all();
      
        return view('layouts.principal.principal', compact('ofertas', 'empresas'));
    }
}
