<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class propos extends Controller
{
    function affiche() {
        return view('propos');
    }
}