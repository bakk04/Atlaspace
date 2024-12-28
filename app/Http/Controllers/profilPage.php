<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class profilPage extends Controller
{
    public function affiche(Request $request){
        $userData=$request->all();
        return view('profile',compact('userData'));
    }
    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('success','Votre espace de connexion');
    }
}