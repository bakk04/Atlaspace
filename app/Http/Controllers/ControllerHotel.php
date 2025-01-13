<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Commentaire;
use Illuminate\Support\Facades\DB;

class ControllerHotel extends Controller
{
    function affiche() {
        $hotelDatas = Hotel::all();
        return view('hotel',compact('hotelDatas'));
    }
    public function Recherche(Request $request)
    {
    // Formater le nom de la ville : première lettre en majuscule
    $Name = ucfirst(strtolower($request->name));
    // Rechercher les hôtels en fonction de la ville
    $hotelDatas = Hotel::where('location',$Name)->get();
    // Retourner les données des hôtels trouvés
    if($hotelDatas->isEmpty()){
        $hotelDatas = Hotel::all();
        return redirect()->route('hotel')->with('error', 'Ville introuvable.');
    }else {
        return view('hotel',compact('hotelDatas'));
    }
    }
}