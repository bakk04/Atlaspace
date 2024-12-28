<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\ReserveActivite;
use App\Models\User;

class Connexion extends Controller
{
    public function login(Request $request)
    {
        // Valider les données reçues
        $credentials = $request->only('email', 'password');
        // Essayer de se connecter
        if (Auth::attempt($credentials)) {
            $userData = Auth::user();
            $userReserve = Reserve::where('user_id', $userData->id)->get();
            $ActiviteReserve = ReserveActivite::where('user_id', $userData->id)->get();
            // Si la connexion est réussie et qu'il n'y a pas de réservations
            return view('profile', compact('userData', 'userReserve','ActiviteReserve'))->with('success', 'Connexion réussie.');
        }
        // Si l'utilisateur n'existe pas, rediriger vers la page de connexion avec un message
        return redirect()->route('login')->with('error', 'Veuillez créer un compte avant de vous connecter ou vérifier vos informations.');
    }

    // Suppression de la réservation d'hôtel
    public function deleteHotel(Request $request) 
    {
        $hotel = Reserve::where('id', $request->id)->first();
        if ($hotel) {
            $hotel->delete();
            // Récupérer à nouveau les données de l'utilisateur
            $userData = Auth::user();
            $userReserve = Reserve::where('user_id', $userData->id)->get();
            $ActiviteReserve = ReserveActivite::where('user_id', $userData->id)->get();
            // Rediriger vers la page de profil avec les données mises à jour
            return view('profile', compact('userData', 'userReserve','ActiviteReserve'))->with('Réservation supprimée avec succès.');
        }
        return back()->with('danger', 'Réservation non trouvée.');
    }

    // Suppression de la réservation d'activité
    public function deleteActivite(Request $request) 
    {
        $activite = ReserveActivite::where('id', $request->id)->first();
        if ($activite) {
            $activite->delete();
            // Récupérer à nouveau les données de l'utilisateur
            $userData = Auth::user();
            $userReserve = Reserve::where('user_id', $userData->id)->get();
            $ActiviteReserve = ReserveActivite::where('user_id', $userData->id)->get();
            return view('profile', compact('userData', 'userReserve','ActiviteReserve'))->with('Réservation supprimée avec succès.');
        }
        return back()->with('danger', 'Réservation non trouvée.');
    } 

    public function deleteProfile(Request $request) {
        $compte = User::where('id', $request->id)->first();
        if ($compte) {
            $compte->delete();
            auth()->logout();
            return redirect()->route('login')->with('success', 'Votre compte a été supprimé avec succès.');
        }
        return redirect()->route('profile.view')->with('error', 'Compte introuvable.');
    }
}