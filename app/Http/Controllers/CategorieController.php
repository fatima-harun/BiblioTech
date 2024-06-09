<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    public function categoriser(){
        return view('categories.categorie');
    }



    public function ajoutcategorie(Request $request){
      Categorie::create($request->all());
      return redirect('/listecategorie');
    }


      public function lister(){
        $categories = Categorie::all();
        return view('categories.Listcategorie',compact('categories'));
      }


      public function editer($id){ 
        $categorie = Categorie::find($id);
        return view('categories.modifier',compact('categorie'));
    }


    public function modifier(Request $request){
      $request->validate([
          'libelle'=>'required',
          'description'=>'required',
      ]);
  
      $categorie = Categorie::find($request->id);
  
      // Mise à jour des informations de la catégorie
      $categorie->libelle = $request->libelle;
      $categorie->description = $request->description;
      $categorie->save();
  
      // Récupération de toutes les catégories après la mise à jour
      $categories = Categorie::all();
  
      // Redirection vers la liste des catégories avec un message de succès
      return view('categories.Listcategorie', compact('categories'));
  }
  
  public function supprimer_categorie($id){
    $categorie = Categorie::find($id);
    $categorie->delete();
    return redirect('/listecategorie');
}
    
}
