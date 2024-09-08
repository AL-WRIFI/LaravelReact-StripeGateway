<?php

namespace App\Http\Controllers\Api;


use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;


class StripePaymentController extends Controller
{
    public function StripePay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_KEY'));


        $checkout = Session::create([
            'success_url' => $request->payment_success_url,
            'line_items' => [[
                'price' => 200,
                'quantity' => 2,
                ],
                'unit_amount' => 400,
            ],
            'mode' => 'payment',
        ]);


        Log::info("checkout",[$checkout]);
        Log::info("checkout",[$checkout->url]);

        return response()->json(['url' => $checkout->url]);

    }
}