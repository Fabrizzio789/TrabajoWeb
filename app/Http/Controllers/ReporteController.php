<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Inventario;

class ReporteController extends Controller
{
    public function index()
    {
        $totalBeneficiarios = Beneficiario::count();

        $totalProductos = Inventario::count();

        $stockBajo = Inventario::where('estado', 'Stock Bajo')->count();

        return view('reportes', compact(
            'totalBeneficiarios',
            'totalProductos',
            'stockBajo'
        ));
    }
}
