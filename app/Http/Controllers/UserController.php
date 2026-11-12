<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
            'password'   => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        return response()->json(['message' => 'Usuario creado', 'data' => $user], 200);
    }

    public function index()
    {
        $users = User::all();
        return response()->json(['message' => 'Lista de usuarios', 'data' => $users], 200);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['message' => 'Usuario encontrado', 'data' => $user], 200);
    }

    public function peticionesUser($id)
    {
        $user = User::findOrFail($id);
        $peticiones = $user->peticiones;
        return response()->json(['message' => 'Peticiones creadas por el usuario', 'data' => $peticiones], 200);
    }
}
