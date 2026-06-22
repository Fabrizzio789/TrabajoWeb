<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();

        return view('inventario', compact('inventarios'));
    }

    public function store(Request $request)
    {
        Inventario::create($request->all());

        return redirect()->back();
    }

    public function destroy($id)
{
    $inventario = Inventario::findOrFail($id);

    $inventario->delete();

    return redirect()->back();
}
public function update(Request $request, $id)
{
    $inventario = Inventario::findOrFail($id);

    $inventario->update([
        'producto' => $request->producto,
        'categoria' => $request->categoria,
        'stock' => $request->stock,
        'fecha' => $request->fecha,
        'estado' => $request->estado,
    ]);

    return redirect()->back();
}
}

