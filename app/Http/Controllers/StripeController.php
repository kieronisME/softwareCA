<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;

class StripeController extends Controller
{
    public function index()
    {
        return view('myRoutes.payments.cartSUC');
    }


    public function createCharge(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 5 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Binaryboxtuts Payment Test"
        ]);

        return redirect('stripe')->with('success', 'Payment Successful!');
    }





    public function paymentSuccess(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 5 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Binaryboxtuts Payment Test"
        ]);
    
        return redirect()->route('MainTestPage')->with('success', 'Payment Successful!');
    }
}
