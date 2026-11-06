<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return response()->json(['message' => null, 'data' => $categorias], 200);
    }


    public function store(Request $request)
    {
        $categoria = new Categoria();
        $nombre = $this->validateNombre($request);

        if ($nombre->fails()) {
            return response()->json($nombre->messages(), 422);
        }

        $categoria = Categoria::create($nombre->validate());
        return response()->json(['message' => 'Categoria Created', 'data' => $categoria], 200);
    }

    public function show(Categoria $categoria)
    {
        return response()->json(['message' => null, 'data' => $categoria], 200);
    }

    private function validateNombre(Request $request)
    {
        return Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
        ]);
    }
}
