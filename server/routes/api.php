<?php

use App\Http\Controllers\Api\StripePaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('stripe-pay',[StripePaymentController::class,'StripePay']);