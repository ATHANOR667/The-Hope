<?php

use Illuminate\Support\Facades\Route;
use Modules\GalerieModule\Http\Controllers\GalerieModuleController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('galeriemodules', GalerieModuleController::class)->names('galeriemodule');
});

/** ROUTES ADMIN */

Route::name('admin.')
    ->prefix('admin')
    ->group(function (){


        /** SIMPLES ROUTES */

        Route::controller(\App\Http\Controllers\Admin\BaseController::class)
            ->middleware( [
                Modules\AdminBase\Http\Middleware\AdminMiddleware::class ,
                Modules\AdminBase\Http\Middleware\UpdateSessionExpiration::class ,
            ])            ->group(function (){
                Route::get('/galerie','galerieView')->name('galerieView');

                Route::get('/manage-home-page','manageHomePageView')->name('manageHomePageView');

                Route::get('/messages-et-newsletter','messagesEtNewsletterView')->name('messagesEtNewsletterView');

            });





    });

