<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['message' => null, 'data' => $users], 200);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
            'password'   => 'required|string|min:6',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages(), 422);
        }

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return response()->json(['message' => 'User Created', 'data' => $user], 200);
    }

    public function show(User $user)
    {
        return response()->json(['message' => null, 'data' => $user], 200);
    }

    public function listarPeticiones ($id) {
        $user = User::findOrFail($id);
        $peticiones = $user->peticiones;
        return response()->json(['message' => 'Peticiones creadas por el usuario', 'data' => $peticiones], 200);
    }
}
