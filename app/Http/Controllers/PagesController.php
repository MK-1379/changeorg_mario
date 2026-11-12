<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function peticiones()
    {
        return view('pages.peticiones');
    }

    public function peticion()
    {
        return view('pages.peticion');
    }

    public function crear()
    {
        return view('pages.crear');
    }
}
