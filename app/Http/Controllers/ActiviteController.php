<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ReserveActivite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function reserve(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'nom_activite' => 'required|string|max:255',
            'prix' => 'required|numeric|min:50|max:10000',
            'ville' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|regex:/^[0-9]{8,15}$/',
            'arrival_date' => 'required|date|after_or_equal:today',
        ]);
        // Vérification de l'utilisateur
        $user = User::where('email', $validated['email'])->first();
        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez créer un compte avant de réserver.');
        }
        // Création de l'activité
        ReserveActivite::create([
            'user_id' => $user->id,
            'nom_activite' => $validated['nom_activite'],
            'ville' => $validated['ville'],
            'dateActivite' => $validated['arrival_date'],
            'prix' => $validated['prix'],
            'Etat' => 'Non payé',
        ]);
        // Redirection avec un message de succès
        return redirect()->route('destination')->with('success', 'Votre réservation a été effectuée avec succès.');
    }
}
