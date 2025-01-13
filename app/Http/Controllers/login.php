<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reserve;
use App\Models\ReserveActivite;
use App\Models\User;
class login extends Controller
{
    function affiche() {
        if(Auth::check()){
            $userData = Auth::user();
            if ($userData->type === 'admin') {
                $client = User::with('reserves');
                $totalHotel = Reserve::all();
                $totalActivite = ReserveActivite::all();
                $totalUser = User::all();
                return view('admin', compact('userData','totalHotel', 'totalActivite', 'totalUser'));
            }
            $userReserve = Reserve::where('user_id', $userData->id)->get();
            $ActiviteReserve = ReserveActivite::where('user_id', $userData->id)->get();
            return view('profile', compact('userData', 'userReserve','ActiviteReserve'));
        }
        else {
            return view('login');
        }
    }
}