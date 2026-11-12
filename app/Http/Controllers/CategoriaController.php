<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriaController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:categorias,nombre',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        $categoria = Categoria::create($validator->validated());
        return response()->json(['message' => 'Categoria creada', 'data' => $categoria], 200);
    }

    public function index()
    {
        $categorias = Categoria::all();
        return response()->json(['message' => 'Lista de categorias', 'data' => $categorias], 200);
    }

    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json(['message' => 'Categoria encontrada', 'data' => $categoria], 200);
    }

    public function peticionesCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $peticiones = $categoria->peticiones;
        $total = $peticiones->count();
        return response()->json(['message' => 'Peticiones de la categoria', 'data' => $peticiones, 'total' => $total], 200);
    }
}
