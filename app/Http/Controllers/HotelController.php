<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserve;
use App\Models\User;
use App\Models\Hotel;
use App\Models\Commentaire;

class HotelController extends Controller
{
    public function affiche(Request $request)
    {
        $hotelData = Hotel::where('id', $request->id)->first();
        $commentaires = Commentaire::where('id_hotel', $hotelData->id)->get();
        return view('details', compact('hotelData','commentaires'));
    }

    public function reserve(Request $request)
    {
        
        $validated = $request->validate([
            'nom_hotel' => 'required|string|max:255',
            'prix' => 'required|numeric|min:500|max:10000',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|regex:/^[0-9]{8,15}$/',
            'arrival_date' => 'required|date|after_or_equal:today',
            'nights' => 'required|numeric|min:1|max:100',
        ]);
        // Vérifier si l'utilisateur existe
        $user = User::where('email', $validated['email'])->first();
        if (!$user) {
            return redirect()->route('login')->with('error', "Veuillez créer un compte avant de réserver.");
        }
        $hotel = Hotel::where('name', $validated['nom_hotel'])->first();
        if ($hotel->chambre < $validated['nights']) {
            return redirect()->route('hotel')->with('error', "Désolé, il n'y a pas suffisamment de chambres disponibles.");
        }
        $hotel->chambre -= $validated['nights'];
        $hotel->save();
        // Créer la réservation
        Reserve::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'nom_hotel' => $validated['nom_hotel'],
            'prix' => $validated['prix'] * $validated['nights'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'arrival_date' => $validated['arrival_date'],
            'nights' => $validated['nights'],
            'Etat' => 'Non payé',
        ]);
        return redirect()->route('hotel')->with('success', 'Votre réservation a été effectuée avec succès.');
    }   
}