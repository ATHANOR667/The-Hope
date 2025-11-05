<?php

use Illuminate\Support\Facades\Route;
use Modules\GalerieModule\Http\Controllers\GalerieModuleController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('galeriemodules', GalerieModuleController::class)->names('galeriemodule');
});
