<?php

use Illuminate\Support\Facades\Route;

/**
 *
 *  ROUTE RESERVEES A UN VISITEUR NON CONNECTE
 *
 */

Route::controller(\App\Http\Controllers\GuestController::class)
    ->prefix('/')
    ->name('guest.')->group(function (){

        // charger l'accueil
        Route::get('/', 'welcome')->name('welcome');

        // traiter les dons
        Route::post('/', 'donate')->name('donate');

        // charger l'accueil
        Route::get('/verify-{cause}-{email}-{nom}-{prenom}', 'verify')->name('verify');


    });



/** ROUTES RESERVEES A L'AUTHENTIFICATION ADMINISTRATEUR
 *
 *
 *
 *
 *
 * PARTIE 1 ( ROUTES LIEES A L'AUTHENTIFICATION UTILISEES LORSQUE L'ADMINISTRATEUR N'EST PAS CONNECTE)
 *
 *
 *
 *
 *
 * */
Route::controller(\App\Http\Controllers\AuthController::class)
    ->prefix('/admin')
    ->name('admin.')->group(function (){

        /** LOGIN
         *
         */

        Route::get('/','login')
            ->name('login');
        Route::post('/','login_process')
            ->middleware('throttle:super-admin-login')
            ->name('login_process');


        /** PASSWORD-RESET-WHILE-IS-NOT-CONNECTED
         *
         * (modifier le mot de passse sans etre connecte)
         */
        Route::get('/password_reset_init_while_dissconnected','password_reset_init_while_dissconnected')->name('password_reset_init_while_dissconnected');
        Route::post('/password_reset_init_while_dissconnected','password_reset_init_while_dissconnected_process')->name('password_reset_init_while_dissconnected');
        Route::get('/password_reset_while_dissconnected','password_reset_while_dissconnected')->name('password_reset_while_dissconnected');
        Route::post('/password_reset_while_dissconnected','password_reset_process_while_dissconnected')->name('password_reset_while_dissconnected');


        /** LOGOUT
         *
         */
        Route::delete('/logout','logout')->name('logout');
    });

/**
 *
 *
 *
 * ROUTES RESERVEES A L'AUTHENTIFICATION ADMINISTRATEUR
 *
 *
 *
 *
 * PARTIE 2 ( ROUTES LIEES A L'AUTHENTIFICATION UTILISEES LORSQUE L'ADMINISTRATEUR EST CONNECTE)
 *
 *
 *
 *
 * */


Route::controller(\App\Http\Controllers\AuthController::class)
    ->middleware(\App\Http\Middleware\AdminAuth::class)
    ->prefix('/admin')
    ->name('admin.')->group(function (){
        /** DEFAULT-ERASE
         *
         * pour la supression des identifiants par defaut (mot de passe : 0000 et email null)
         */
        Route::get('/otp_request_default_erase', 'otp_request_default_erase')->name('otp_request_default_erase');
        Route::post('/otp_request_default_erase', 'otp_request_default_erase_process')->name('otp_request_default_erase');

        Route::get('/default_erase', 'default_erase')->name('default_erase');
        Route::post('/default_erase', 'default_erase_process')->name('default_erase');


        /** PASSWORD-RESET-WHILE-IS-CONNECTED
         *
         * (modifier lemot de passse etant deja connecte)
         */
        Route::get('/password_reset_init', 'password_reset_init')->name('password_reset_init');
        Route::get('/password_reset', 'password_reset')->name('password_reset');
        Route::post('/password_reset', 'password_reset_process')->name('password_reset');


        /** EMAIL - RESET
         *
         * (pour modifier l'adresse mail associee au compte )
         */
        Route::get('/email_reset_otp_request', 'email_reset_otp_request')->name('email_reset_otp_request');
        Route::post('/email_reset_otp_request', 'email_reset_otp_request_process')->name('email_reset_otp_request');
        Route::get('/email_reset', 'email_reset')->name('email_reset');
        Route::post('/email_reset', 'email_reset_process')->name('email_reset');



    });

/**
 *
 *
 *
 *ROUTES DES PAGES RESERVEES A L'ADMINISTRATEUR
 *
 *
 * (lorsqu'il est connecté)
 *
 *
 *
 *
 *
 */

Route::controller(\App\Http\Controllers\AdminController::class)
    ->middleware(\App\Http\Middleware\AdminAuth::class)
    ->prefix('/admin')
    ->name('admin.')->group(function (){
        Route::get('/accueil','accueil')->name('accueil');

        Route::get('/profil','profil')->name('profil');

        Route::get('/causeShow-{cause}','causeShow')->name('causeShow');

    }) ;


