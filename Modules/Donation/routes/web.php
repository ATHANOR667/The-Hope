<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\PSP\StripeService;

Route::controller(\Modules\Donation\Http\Controllers\PspController::class)
    ->name('payment.')->group(function (){

        // traiter les dons avec notchpay
        Route::post('/donate-notchpay', 'donateNotchpay')->name('donate.notchpay');

        // traiter les dons avec Stripe
        Route::post('/donate-stripe', 'donateStripe')->name('donate.stripe');

        // Routes de callback/vérification
        // Callback pour NotchPay (après la redirection de paiement)
        Route::get('/verify/{email}/{nom}/{prenom}', 'verifyNotchpay')->name('verify.notchpay');

        Route::get('/success/stripe/{don}', 'successStripe')->name('success.stripe');
        Route::get('/cancel/stripe/{don}', 'cancelStripe')->name('cancel.stripe');

    });

/**
 *Payement Stripe
 */
Route::match(['post','get'] ,'/webhook/stripe', function (Request $request, StripeService $stripeService) {
    return $stripeService->handleWebhook($request);
});
