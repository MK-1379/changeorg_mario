<?php

use App\Http\Controllers\PeticioneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;

Route::controller(CategoriaController::class)->group(function () {
    Route::get('categorias', 'index');
    Route::post('categoria', 'store');
    Route::get('categoria/{categoria}', 'show');
    Route::get('categoria/{id}/peticiones', 'listarPeticiones');
});

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('user', 'register');
    Route::get('user/{user}', 'show');
    Route::get('user/{id}/peticiones', 'listarPeticiones');
});

Route::controller(PeticioneController::class)->group(function () {
    Route::get('peticiones', 'index');
    Route::post('peticion', 'store');
    Route::get('peticion/{peticion}', 'show');
    Route::get('peticiones/{id}/categoria', 'verCategoria');
    Route::post('peticiones/firmar/{id}/user/{user_id}', 'firmar');
    Route::get('peticiones/{id}/firmantes', 'verFirmantes');
    Route::put('peticion/{id}', 'updateEstado');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
