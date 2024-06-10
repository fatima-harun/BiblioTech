<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // Importez la classe Auth


class UserController extends Controller
{
    // fonction pour creer un utilisateur
    public function creer(){
      return view('authentification.inscription');
    }
    // fonction pour traiter les donnes de l'utilisateur
    public function store(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'email' => 'required|email|unique:personnels,email',
            'mot_de_passe' => 'required|min:8',
            'telephone' => 'required|digits:9',
        ], [
            'nom.required' => 'Veuillez entrer votre nom.',
            'prenom.required' => 'Veuillez entrer votre prénom.',
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'email.unique' => 'Cette adresse email est déjà utilisée.',
            'mot_de_passe.required' => 'Veuillez entrer votre mot de passe.',
            'mot_de_passe.min' => 'Votre mot de passe doit comporter au moins 4 caractères.',
            'telephone.required' => 'Veuillez entrer votre numéro de téléphone.',
            'telephone.digits' => 'Le numéro de téléphone doit comporter exactement 9 chiffres.',
        ]);



        $user=new user();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->adresse=$request->adresse;
        $user->telephone=$request->telephone;
        $user->password=bcrypt($request->password);
        $user->save();
        return view ('authentification.connexion');
    }


    // fonction pour se connecter
    public function connecter(){
    
        return view('authentification.connexion');
    }
  
    public function authentifier(Request $request){

         // Valider les données de la requête
         $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Veuillez entrer votre adresse email.',
            'email.email' => 'Veuillez entrer une adresse email valide.',
            'password.required' => 'Veuillez entrer votre mot de passe.',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/index');
        }
        return redirect('/creer');

        
    }
}
