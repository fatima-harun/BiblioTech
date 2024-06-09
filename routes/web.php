<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\CategorieController;

Route::get('/', function () {
    return view('welcome');
});

// route pour les livres
Route::get('/index', [LivreController::class, 'afficher'])->name('affichage');// route pour afficher les livres
Route::get('/ajouter', [LivreController::class, 'ajout'])->name('ajout');// route pour acceder au formulaire d'ajout
Route::post('/traiter', [LivreController::class, 'sauvegarder'])->name('traitement');// route pour traiter les données

// route pour les catégories
Route::get('/categories', [CategorieController::class, 'categoriser'])->name('categories');// route pour afficher le formulaire d'ajout
Route::post('/traitercategorie', [CategorieController::class, 'ajoutcategorie'])->name('ajoutcategorie');// route pour traiter les categories données
Route::get('/listecategorie', [CategorieController::class, 'lister'])->name('liste');// route pour afficher des categories
Route::post('/modifiercategorie', [CategorieController::class, 'modifier'])->name('modification');// route pour modifier la catégorie
Route::get('/editer/{id}', [CategorieController::class, 'editer'])->name('editeur');// route pour récupérer la catégorie à modifier
Route::delete('/supprimer/{id}', [CategorieController::class, 'supprimer_categorie']);



Route::get('/register', [UserController::class, 'creer'])->name('creation');
Route::post('/register', [UserController::class, 'store'])->name('enregistrement');

Route::get('/login', [UserController::class, 'connecter'])->name('connexion');
// Route::post('/log', [UserController::class, 'authentifier'])->name('authentification');
