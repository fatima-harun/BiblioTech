<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivreController;

Route::get('/', function () {
    return view('welcome');
});

// route pour afficher les livres
Route::get('/index', [LivreController::class, 'afficher'])->name('affichage');
// route pour acceder au formulaire d'ajout
Route::get('/ajouter', [LivreController::class, 'ajout'])->name('ajout');
// route pour traiter les données
Route::post('/traiter', [LivreController::class, 'sauvegarder'])->name('traitement');



Route::get('/register', [UserController::class, 'creer'])->name('creation');
Route::post('/register', [UserController::class, 'store'])->name('enregistrement');

Route::get('/login', [UserController::class, 'connecter'])->name('connexion');
// Route::post('/log', [UserController::class, 'authentifier'])->name('authentification');
