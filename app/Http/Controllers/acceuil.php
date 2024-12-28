<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class acceuil extends Controller
{
    function affiche() {
        return view('Acceuil');
    }
}
