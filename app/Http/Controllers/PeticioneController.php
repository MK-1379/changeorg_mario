<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Peticione;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class PeticioneController extends Controller
{
    public function index()
    {
        $peticiones = Peticione::all();
        return response() -> json($peticiones);
    }

    public function show($id){
        $peticion=Peticione::findOrFail($id);
        return response() -> json($peticion, 200);
    }

    public function store(Request $request)
    {
        $peticion = new Peticione();
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:255',
            'destinatario' => 'required|string|max:255',
            'firmantes' => 'required|string|max:255',
            'estado' => 'required|in:aceptada,pendiente'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->messages(), 400);
        }

        $input = $request->all();

        $peticion->titulo = $request->input('titulo');
        $peticion->descripcion = $request->input('descripcion');
        $peticion->destinatario = $request->input('destinatario');

        $categoria = Categoria::findOrFail($input['categoria_id']);

        // Hardcodear el user creador
        $user=User::findOrFail(1);
        $peticion = new Peticione($input);
        $peticion->firmantes = 0;
        $peticion->user()->associate($user);
        $peticion->categoria()->associate($categoria);
        $peticion->save();

        return response() -> json(['message' => 'Peticion creada', 'data' => $peticion], 200);
    }
}
