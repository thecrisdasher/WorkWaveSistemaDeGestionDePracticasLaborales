<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use App\Models\Ofertas;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function imprimirUsers(Request $request)
    {
    $users=User::orderBy('id','ASC')->get();
    $pdf = \PDF::loadView('pdf.usersPDF',['users' => $users ]);
    $pdf->setPaper('carta', 'A4');
    return $pdf->stream();
    }

    public function imprimirOfertas(Request $request)
    {
    $ofertas=Ofertas::orderBy('id_oferta','ASC')->get();
    $pdf = \PDF::loadView('pdf.ofertasPDF',['ofertas' => $ofertas ]);
    $pdf->setPaper('carta', 'A4');
    return $pdf->stream();
    }
    public function imprimirEmpresas(Request $request)
    {
    $empresas=Empresas::orderBy('id_empresa','ASC')->get();
    $pdf = \PDF::loadView('pdf.empresasPDF',['empresas' => $empresas ]);
    $pdf->setPaper('carta', 'A4');
    return $pdf->stream();
    }
}
