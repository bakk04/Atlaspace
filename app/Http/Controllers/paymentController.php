<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentIntent(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:50',
        ]);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret')); // Clé secrète Stripe

        try {
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->amount, // Montant en centimes
                'currency' => 'mad', // Remplacez par votre devise
            ]);

            return response()->json([
                //un identifiant unique généré par Stripe
                'clientSecret' => $paymentIntent->client_secret,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}