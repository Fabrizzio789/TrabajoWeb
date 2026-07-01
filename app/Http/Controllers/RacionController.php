<?php

namespace App\Http\Controllers;

use App\Models\Racion;
use App\Models\Beneficiario;
use Illuminate\Http\Request;

class RacionController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiario::all();

        $raciones = Racion::with('beneficiario')->get();

        return view('raciones', compact(
            'beneficiarios',
            'raciones'
        ));
    }

    public function store(Request $request)
    {
        Racion::create([
            'beneficiario_id' => $request->beneficiario_id,
            'cantidad' => $request->cantidad,
            'fecha' => $request->fecha,
        ]);

        return redirect()->back();
    }
}