<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use App\Models\Inventario;
use App\Models\Racion;

class ReporteController extends Controller
{
    public function index()
    {
        $totalBeneficiarios = Beneficiario::count();

        $totalProductos = Inventario::count();

        $stockBajo = Inventario::where('estado', 'Stock Bajo')->count();

        $totalRaciones = Racion::sum('cantidad');

        // Obtener todas las entregas registradas
        $reportes = Racion::with('beneficiario')->latest()->get();

        return view('reportes', compact(
            'totalBeneficiarios',
            'totalProductos',
            'stockBajo',
            'totalRaciones',
            'reportes'
        ));
    }
}