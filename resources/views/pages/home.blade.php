@extends('layouts.app')

@section('title', 'Inicio - Change Mario')

@section('content')
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Cambia las cosas con tu firma</h1>
        <p class="lead text-muted">
            Crea peticiones, fírmalas y consigue el apoyo que necesitan.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Peticiones</h2>
                    <p class="text-muted">Listado de todas las peticiones creadas.</p>
                    <a href="{{ url('/api/peticiones') }}" class="btn btn-outline-danger">Ver peticiones</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Categorías</h2>
                    <p class="text-muted">Las categorías en las que se clasifican las peticiones.</p>
                    <a href="{{ url('/api/categorias') }}" class="btn btn-outline-danger">Ver categorías</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h2 class="h5">Usuarios</h2>
                    <p class="text-muted">Usuarios registrados que crean y firman peticiones.</p>
                    <a href="{{ url('/api/users') }}" class="btn btn-outline-danger">Ver usuarios</a>
                </div>
            </div>
        </div>
    </div>
@endsection