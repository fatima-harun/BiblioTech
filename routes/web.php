<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [UserController::class, 'creer'])->name('creation');
Route::post('/register', [UserController::class, 'store'])->name('enregistrement');

Route::get('/login', [UserController::class, 'connecter'])->name('connexion');
// Route::post('/log', [UserController::class, 'authentifier'])->name('authentification');
