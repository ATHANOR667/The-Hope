<?php

use Illuminate\Support\Facades\Route;
use Modules\ContactEtNewsletter\Http\Controllers\ContactEtNewsletterController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('contactetnewsletters', ContactEtNewsletterController::class)->names('contactetnewsletter');
});
