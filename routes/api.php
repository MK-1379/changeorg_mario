<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PeticioneController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoriaController::class)->group(function () {
    Route::get('categorias', 'index');
    Route::post('categoria', 'store');
    Route::get('categoria/{id}', 'show');
    Route::get('categoria/{id}/peticiones', 'peticionesCategoria');
});

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('user', 'store');
    Route::get('user/{id}', 'show');
    Route::get('user/{id}/peticiones', 'peticionesUser');
});

Route::controller(PeticioneController::class)->group(function () {
    Route::get('peticiones', 'index');
    Route::post('peticion', 'store');
    Route::get('peticion/{id}', 'show');
    Route::get('peticion/{id}/categoria', 'categoriaPeticion');
    Route::get('peticion/{id}/firmantes', 'firmantesPeticion');
    Route::post('user/{user}/peticion/{peticione}/firmar', 'firmar');
    Route::put('peticion/{id}', 'update');
    Route::put('peticion/{id}/estado', 'cambiarEstado');
    Route::delete('peticion/{id}', 'destroy');
});
