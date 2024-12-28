<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acceuil;
use App\Http\Controllers\ControllerHotel;
use App\Http\Controllers\Login;
use App\Http\Controllers\Propos;
use App\Http\Controllers\Destination;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\DestinationActive;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Connexion;
use App\Http\Controllers\ProfilPage;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CommentaireController;

// Routes GET pour afficher les différentes pages
Route::get('/', [Acceuil::class, 'affiche']);
Route::get('/hotel', [ControllerHotel::class, 'affiche'])->name('hotel');
Route::get('/destination', [Destination::class, 'affiche'])->name('destination');
Route::get('/propos', [Propos::class, 'affiche']);
Route::get('/login', [Login::class, 'affiche'])->name('login');
Route::get('/connexion', [Connexion::class, 'showLoginForm'])->name('connexion');
Route::get('/profile', [ProfilPage::class, 'affiche'])->name('profile.view');
Route::get('/hotel/details', [HotelController::class, 'affiche'])->name('hotel.details');
Route::get('/profile/logout', [ProfilPage::class, 'logout'])->name('logout');


// Routes POST pour gérer les actions
Route::post('/hotel/details', [HotelController::class, 'affiche'])->name('hotel.details');
Route::post('/hotel/reserve', [HotelController::class, 'reserve'])->name('hotel.reserve');
Route::post('/activite/reserve', [ActiviteController::class, 'reserve'])->name('activite.reserve');
Route::post('/destination/activite', [DestinationActive::class, 'affiche'])->name('destination.activite');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/connexion', [Connexion::class, 'login'])->name('connexion.submit');
Route::post('/payment-intent', [PaymentController::class, 'createPaymentIntent'])->name('payment.intent');
Route::post('/hotel/details/commentaire', [CommentaireController::class, 'affiche'])->name('commentaire.store');

// Routes DELETE pour gérer les suppressions
Route::delete('/profile/delete', [Connexion::class, 'deleteProfile'])->name('profile.delete');
Route::delete('/profile/activite',[Connexion::class,'deleteActivite'])->name('activite.supprime');
Route::delete('/profile/hotel',[Connexion::class,'deleteHotel'])->name('hotel.supprime');