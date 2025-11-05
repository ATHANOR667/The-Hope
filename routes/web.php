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


Route::controller(\App\Http\Controllers\Admin\BaseController::class)
    ->prefix('admin/')
    ->name('admin.')
    ->middleware( [
        Modules\AdminBase\Http\Middleware\AdminMiddleware::class ,
        Modules\AdminBase\Http\Middleware\UpdateSessionExpiration::class , 
    ])->group(function (){
        Route::get('/','profileView')->name('profileView');
        Route::get('/profile','profileView')->name('profileView');
        Route::get('/logsDashboard','logsDashboardView')->name('logsDashboardView');
        Route::get('/finances','finances')->name('finances');

});
