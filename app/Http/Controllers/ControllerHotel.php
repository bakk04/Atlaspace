<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Commentaire;

class ControllerHotel extends Controller
{
    function affiche() {
        $hotelDatas = Hotel::all();
        return view('hotel',compact('hotelDatas'));
    }
}