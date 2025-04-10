<?php

namespace App\Http\Controllers;

use App\Models\Ofertas;
use App\Models\Empresas;
use App\Models\Postulantes;
use Illuminate\Support\Facades\DB;
use App\Enums\RolType; // Asegúrate de incluir el enum RolType
use App\Models\Postulante;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Obtener todas las ofertas, empresas, postulantes
        $ofertas = Ofertas::all();
        $postulantes = Postulante::all();
        $empresas = Empresas::all();

        // Obtener el rol del usuario autenticado
        $userRole = auth()->user()->role;

        // Consulta para obtener el número de postulaciones por empresa
        $datosPostulacionesPorEmpresa = DB::table('solicitudes')
            ->join('ofertas', 'solicitudes.id_oferta', '=', 'ofertas.id_oferta')
            ->join('empresas', 'ofertas.id_empresa', '=', 'empresas.id_empresa')
            ->select('empresas.nombre', DB::raw('COUNT(solicitudes.id_solicitud) as total_postulaciones'))
            ->groupBy('empresas.nombre')
            ->get();

        // Consulta para obtener el número de postulaciones por fecha
        $datosPostulacionesPorFecha = DB::table('solicitudes')
            ->select(DB::raw('DATE(fecha_solicitud) as fecha'), DB::raw('COUNT(id_solicitud) as total_postulaciones'))
            ->groupBy('fecha')
            ->orderBy('fecha', 'ASC')
            ->get();

        // Pasar las variables a la vista
        return view('layouts.dashboard.dashboard-content', compact('ofertas', 'empresas', 'userRole', 'postulantes', 'datosPostulacionesPorEmpresa', 'datosPostulacionesPorFecha'));
    }
}
