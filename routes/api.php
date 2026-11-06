<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UserController;

Route::controller(CategoriaController::class)->group(function () {
    Route::get('categorias', 'index');
    Route::post('categoria', 'store');
    Route::get('categoria/{categoria}', 'show');
});

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index');
    Route::post('register', 'register');
    Route::get('user/{user}', 'show');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
