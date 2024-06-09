<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rayon;

class RayonController extends Controller
{
    //fonction pour afficher le formulaire
    public function rayon(){
        return view('rayons.rayon');
    }
     //fonction pour ajouter dans  le formulaire
    public function ajoutrayon(Request $request){
      Rayon::create($request->all());
      return redirect('/listerayon');
    }
//fonction pour afficher la liste des rayons

      public function listerayon(){
        $rayons = Rayon::all();
        return view('rayons.listrayon',compact('rayons'));
      }

   //fonction pour rcupérer l'id à mole formulaire
      public function editerayon($id){ 
        $rayon = Rayon::find($id);
        return view('rayons.modifierayon',compact('rayon'));
    }


    public function modifier(Request $request){
      $request->validate([
          'libelle'=>'required',
          'partie'=>'required',
      ]);
  
      $rayon = Rayon::find($request->id);
  
      // Mise à jour des informations des rayons
      $rayon->libelle = $request->libelle;
      $rayon->partie = $request->partie;
      $rayon->save();
  
      // Récupération de tous les rayons après la mise à jour
      $rayons = Rayon::all();
  
      // Redirection vers la liste des rayons 
      return view('rayons.Listrayon', compact('rayons'));
  }
  
  public function supprimer_rayon($id){
    $rayon = Rayon::find($id);
    $rayon->delete();
    return redirect('/listerayon');
}
    
}

