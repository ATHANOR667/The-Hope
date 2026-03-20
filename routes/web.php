<?php

use Illuminate\Support\Facades\Route;

Route::name('visitor.')
    ->controller(\App\Http\Controllers\VisitorController::class)
    ->group(function () {

        Route::get('/','accueil')->name('accueil');

        Route::get('/donate','donate')->name('donate');

        Route::get('/galerie','galerie')->name('galerie');

        Route::get('/contact-us','contact')->name('contact-us');

        Route::get('/login','login')->name('login');

    });

Route::get('/manageHomePage', [\App\Http\Controllers\AdminController::class,'manageHomePage'])
    ->middleware( [
        \Modules\AdminBase\Http\Middleware\Admin\AdminMiddleware::class ,
        \Modules\AdminBase\Http\Middleware\Admin\AdminAuthenticateSession::class
    ])->name('manageHomePage');


