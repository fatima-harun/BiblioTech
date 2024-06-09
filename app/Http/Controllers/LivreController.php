<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class LivreController extends Controller

// la fonction pour afficher les livres
{
    public function afficher()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }
    // la fonction pour afficher le formulaire d'ajout des livres
    public function ajout(){
    return view('livres.ajout');
    }
     // la fonction pour traiter l'ajout des livres
    public function sauvegarder(Request $request){
        $request->validate([
            'titre' => 'required|max:255',
            'auteur' => 'required',
            'editeur' => 'required',
            'url' => 'required',
            'publication' => 'required',
            'isbn' => 'required',
            'page' => 'required',
            'description' => 'required',

        ]);
        Livre::create($request->all());
        return redirect('/index');
    }
}
