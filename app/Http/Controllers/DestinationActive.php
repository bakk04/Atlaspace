<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Activite;

class DestinationActive extends Controller
{
    public function affiche(Request $request)
{
    // Transformer le nom pour qu'il commence par une majuscule et le reste en minuscule
    $formattedName = ucfirst(strtolower($request->name));
    $Ville = Ville::where('name', $formattedName)->first();
    if (!$Ville) {
        return redirect()->route('destination')->with('error', 'Ville introuvable.');
    }    
    $Activite = Activite::where('id_ville', $Ville->id)->get();
    return view('activite', compact('Ville', 'Activite'));
}
}
