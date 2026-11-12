<?php

namespace App\Http\Controllers;

use App\Models\Peticione;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeticioneController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'destinatario' => 'required|string|max:255',
            'categoria_id' => 'required|integer|exists:categorias,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        // Hardcodear el user creador (hasta que haya login)
        $user = User::findOrFail(1);

        $peticion = new Peticione($validator->validated());
        $peticion->firmantes = 0;
        $peticion->estado = 'pendiente';
        $peticion->user()->associate($user);
        $peticion->save();
        return response()->json(['message' => 'Peticion creada', 'data' => $peticion], 200);
    }

    public function index()
    {
        $peticiones = Peticione::all();
        return response()->json(['message' => 'Lista de peticiones', 'data' => $peticiones], 200);
    }

    public function show($id)
    {
        $peticion = Peticione::findOrFail($id);
        return response()->json(['message' => 'Peticion encontrada', 'data' => $peticion], 200);
    }

    public function categoriaPeticion($id)
    {
        $peticion = Peticione::findOrFail($id);
        $categoria = $peticion->categoria;
        return response()->json(['message' => 'Categoria de la peticion', 'data' => $categoria], 200);
    }

    public function firmantesPeticion($id)
    {
        $peticion = Peticione::findOrFail($id);
        $firmantes = $peticion->firmas;
        return response()->json(['message' => 'Firmantes de la peticion', 'data' => $firmantes], 200);
    }

    public function firmar(User $user, Peticione $peticione)
    {
        $yaFirmada = $peticione->firmas()->where('user_id', $user->id)->exists();
        if ($yaFirmada) {
            return response()->json(['message' => 'El usuario ya ha firmado esta peticion', 'data' => null], 409);
        }

        $peticione->firmas()->attach($user->id);
        $peticione->firmantes = $peticione->firmantes + 1;
        $peticione->save();
        return response()->json(['message' => 'Peticion firmada', 'data' => $peticione], 200);
    }

    public function update(Request $request, $id)
    {
        $peticion = Peticione::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'titulo'       => 'sometimes|required|string|max:255',
            'descripcion'  => 'sometimes|required|string',
            'destinatario' => 'sometimes|required|string|max:255',
            'categoria_id' => 'sometimes|required|integer|exists:categorias,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        $peticion->update($validator->validated());
        return response()->json(['message' => 'Peticion actualizada', 'data' => $peticion], 200);
    }

    public function cambiarEstado(Request $request, $id)
    {
        $peticion = Peticione::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'estado' => 'required|in:aceptada,pendiente',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        $peticion->estado = $request->input('estado');
        $peticion->save();
        return response()->json(['message' => 'Estado de la peticion actualizado', 'data' => $peticion], 200);
    }

    public function destroy($id)
    {
        $peticion = Peticione::findOrFail($id);
        if ($peticion->firmas()->exists()) {
            return response()->json(['message' => 'No se puede borrar una peticion que tiene firmas', 'data' => null], 409);
        }

        $peticion->delete();
        return response()->json(['message' => 'Peticion eliminada', 'data' => $peticion], 200);
    }
}
