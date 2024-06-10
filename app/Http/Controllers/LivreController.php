<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Rayon;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LivreController extends Controller
{
    // la fonction pour afficher les livres
    public function afficher()
    {
        $user = Auth::user(); // Recuperer l'utilisateur  authentifié
        $livres = Livre::all();
        return view('livres.index', compact('user','livres'));
    }

    // la fonction pour afficher le formulaire d'ajout des livres
    public function ajout()
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
        // Récupérer tous les rayons
        $rayons= Rayon::all();

        return view('livres.ajout', compact('categories','rayons'));
    }

    // la fonction pour traiter l'ajout des livres
    public function sauvegarder(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'auteur' => 'required',
            'editeur' => 'required',
            'url' => 'required',
            'publication' => 'required',
            'isbn' => 'required',
            'page' => 'required',
            'categorie_id' => 'required|exists:categories,id',
            'rayon_id' => 'required|exists:categories,id',
            'description' => 'required',
        ]);

        Livre::create($request->all());
        return redirect('/index');
    }

    // Méthode pour afficher les détails d'un livre
    public function detailsLivre($id)
    {
        // Récupérer le livre par son identifiant
        $livre = Livre::find($id);

        // Retourner la vue livres.details avec le livre
        return view('livres.details', compact('livre'));
    }
     //route pour traiter les données à modifier
    public function editelivre($id){
        // Récupérer le livre par son identifiant
        $livre = Livre::find($id);
        
        // Récupérer toutes les catégories
        $categories = Categorie::all();

         // Récupérer tous les rayons
        $rayons = Rayon::all();
        
        // Retourner la vue livres.editlivre avec le livre, les catégories et les rayons
        return view('livres.editlivre', compact('livre', 'categories', 'rayons'));
    }
    //route pour afficher le formulaire d'affichage
    public function modifier(Request $request){
          // Récupérer le livre par son identifiant
          $livre = Livre::find($request->id);
        
          // Mettre à jour le livre avec les données de la requête
          $livre->update($request->all());
          
          // Rediriger vers la page où s'affiche les livres
          return redirect("/index");
    }
    public function supprimer_livre($id){
        $livre = Livre::find($id);
        $livre->delete();
        return redirect('/index');
    }
}
