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
 
        dd(Auth::user());
        /* 
        Validation
        */
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'telephone' => 'required',
            'adresse' => 'required',
            'prenom' => 'required',
        ]);

        $user=new user();
        $user->nom=$request->nom;
        $user->prenom=$request->prenom;
        $user->email=$request->email;
        $user->adresse=$request->adresse;
        $user->telephone=$request->telephone;
        $user->password=bcrypt($request->password);
        $user->save();

        Auth::login($user);
    }


    // fonction pour se connecter
    public function connecter(){
    
        return view('authentification.connexion');
    }
  
    public function authentifier(Request $request){
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        dd(Auth::attempt($credentials));
        //     return view('welcome');
        // }
        // return ('error');

        
    // }

}
}
