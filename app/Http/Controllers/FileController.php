<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Peticione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function store(Request $request, $id)
    {
        $peticion = Peticione::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'file_path' => 'required|string|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json(['message' => 'Failed', 'data' => $validator->messages()], 422);
        }

        // create() a traves de la relacion rellena peticione_id automaticamente
        $file = $peticion->files()->create($validator->validated());
        return response()->json(['message' => 'Archivo creado', 'data' => $file], 200);
    }

    public function filesPeticion($id)
    {
        $peticion = Peticione::findOrFail($id);
        $files = $peticion->files;
        $total = $files->count();
        return response()->json(['message' => 'Archivos de la peticion', 'data' => $files, 'total' => $total], 200);
    }

    public function peticionFile($id)
    {
        $file = File::findOrFail($id);
        return response()->json(['message' => 'Peticion del archivo', 'data' => $file->peticione], 200);
    }
}
