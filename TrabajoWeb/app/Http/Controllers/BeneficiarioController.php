<?php

namespace App\Http\Controllers;

use App\Models\Beneficiario;
use Illuminate\Http\Request;

class BeneficiarioController extends Controller
{
    public function index()
    {
        $beneficiarios = Beneficiario::all();

        return view('beneficiarios', compact('beneficiarios'));
    }

    public function store(Request $request)
    {
        Beneficiario::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request, $id)
{
    $beneficiario = Beneficiario::findOrFail($id);

    $beneficiario->update([
        'nombres' => $request->nombres,
        'apellidos' => $request->apellidos,
        'dni' => $request->dni,
        'telefono' => $request->telefono,
        'direccion' => $request->direccion,
    ]);

    return redirect()->back();
}

public function destroy($id)
{
    $beneficiario = Beneficiario::findOrFail($id);

    $beneficiario->delete();

    return redirect()->back();
}
}
