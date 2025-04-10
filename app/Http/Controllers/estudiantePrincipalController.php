<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\Empresas;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // Filtro por Cargo (Empresa)
        if ($request->filled('cargo') && $request->cargo !== 'all') {
            $cargo = $request->cargo;
            $ofertas->whereHas('empresa', function($query) use ($cargo) {
                $query->where('nombre', $cargo);
            });
        }

        // Obtener las ofertas filtradas
        $ofertas = $ofertas->get();

        // Calcular empresas agrupadas por fecha de creación
        $empresasPorFecha = Empresas::select(DB::raw('DATE(created_at) as fecha'), DB::raw('COUNT(*) as total'))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();

        // Si la solicitud es AJAX, devolvemos el fragmento de las ofertas
        if ($request->ajax()) {
            if ($ofertas->isEmpty()) {
                return response()->json(['message' => 'No hay ofertas disponibles.']);
            }
            return view('partials.ofertas-list', compact('ofertas'));
        }

        // Devolver la vista principal con las ofertas y las empresas agrupadas por fecha
        $empresas = Empresas::all();
        return view('principal-window-user.principal-window-student', compact('ofertas', 'empresas', 'empresasPorFecha'));
    }

    public function index()
    {
        // Agrupar empresas por fecha de creación y contar
        $empresasPorFecha = Empresas::select(DB::raw('DATE(created_at) as fecha'), DB::raw('COUNT(*) as total'))
            ->groupBy('fecha')
            ->orderBy('fecha', 'asc')
            ->get();

        return view('layouts.principal.principal', compact('empresasPorFecha'));
    }

    public function buscarOfertas(Request $request)
    {
        $query = $request->input('query');

        // Buscar ofertas relacionadas al nombre ingresado
        $ofertas = Ofertas::where('nombre_oferta', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->get();

        // Retornar la vista con las ofertas relacionadas
        return view('principal-window-user.ofertas-relacionadas', compact('ofertas', 'query'));
    }
}
