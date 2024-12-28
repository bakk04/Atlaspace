<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Commentaire;

class CommentaireController extends Controller
{
    public function affiche(Request $request)
    {
        // Récupérer les données de l'hôtel en fonction du nom
        $hotelData = Hotel::where('name', $request->nom_hotel)->first();
        // Validation des données entrantes
        $validated = $request->validate([
            'nom_hotel' => 'required|string|max:255',
            'user_name' => 'required|string|max:255',
            'content' => 'required|string|max:1000', 
        ]);
        // Création du commentaire
        Commentaire::create([
            'user_name' => $validated['user_name'], // Utilisation de la virgule
            'id_hotel' => $hotelData->id,
            'content' => $validated['content'],
            'created_at' => now()
        ]);
        // Retourner une réponse, par exemple un succès
        return redirect()->route('hotel')->with('success', 'Votre Commentaire a été Ajouté avec success');
    }
}
