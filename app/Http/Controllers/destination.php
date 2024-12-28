<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ville;

class destination extends Controller
{
    function affiche() {
        $VilleDatas = ville::all();
        return view('destination',compact('VilleDatas'));
    }
}