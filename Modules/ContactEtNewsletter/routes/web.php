<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactEtNewsletter\Http\Controllers\ContactEtNewsletterController;
use Modules\ContactEtNewsletter\Http\Controllers\EmailWebhookController;
use Modules\ContactEtNewsletter\Http\Controllers\TwilioWebhookController;
use Modules\ContactEtNewsletter\Livewire\Visitor\Newsletter\NewsletterManageSubscription;


Route::name('visitor.newsletter.')
    ->group(function () {


        Route::get('/track-{d}',[ContactEtNewsletterController::class,'track'])->name('track');

        Route::get('/manage',NewsletterManageSubscription::class)->name('manage');


    });

Route::name('webhook.')
    ->prefix('webhook')
    ->group(function () {


        Route::post('/twilio', [TwilioWebhookController::class, 'handle'])->name('twilio');

        Route::post('/email', [EmailWebhookController::class, 'handle'])->name('email');
    });


