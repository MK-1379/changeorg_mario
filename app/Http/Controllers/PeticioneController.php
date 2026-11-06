<?php

namespace App\Http\Controllers;

use App\Models\Peticione;

class PeticioneController extends Controller
{
    public function index()
    {
        $peticiones = Peticione::all();
        return view('peticiones.index', compact('peticiones'));
    }
}
