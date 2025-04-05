<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postulacion; // Asegúrate de tener un modelo para las postulaciones
use Illuminate\Support\Facades\Auth;

class PostulacionesController extends Controller
{
    /**
     * Muestra las estadísticas de las postulaciones del usuario autenticado.
     */
    public function statistics()
    {
        $userId = Auth::id(); // Obtén el ID del usuario autenticado

        // Obtén las estadísticas de las postulaciones del usuario
        $postulaciones = Postulacion::where('id_postulante', $userId)->get(); // Cambiar PostulacionesController a Postulacion

        // Ejemplo de datos para estadísticas
        $totalPostulaciones = $postulaciones->count();
        $postulacionesAceptadas = $postulaciones->where('estado', 'aceptada')->count();
        $postulacionesRechazadas = $postulaciones->where('estado', 'rechazada')->count();
        $postulacionesPendientes = $postulaciones->where('estado', 'pendiente')->count();



        // Retorna la vista con los datos
        return view('layouts.postulaciones.statistics', [
            'totalPostulaciones' => $totalPostulaciones,
            'postulacionesAceptadas' => $postulacionesAceptadas,
            'postulacionesRechazadas' => $postulacionesRechazadas,
            'postulacionesPendientes' => $postulacionesPendientes,
        ]);
    }
}