<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Http\Request;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loginLimitTry();
        $this->configureRateLimiting();
    }

    protected function loginLimitTry(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return [
                Limit::perMinute(5)->by($request->ip())->response(function (Request $request, array $headers) {
                    return response()->json([
                        'status' => 429,
                        'message' => 'Limite atteinte . Veuillez réessayer dans '.$headers['Retry-After'].' secondes.' ,
                    ], 429);
                }),
                Limit::perMinute(5)->by($request->input('email'))->response(function (Request $request, array $headers) {
                    return response()->json([
                        'status' => 429,
                        'message' => 'Limite atteinte . Veuillez réessayer dans '.$headers['Retry-After'].' secondes.' ,
                    ], 429);
                }),
            ];
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('super-admin-login', function (Request $request) {
            return [
                Limit::perMinute(3)->response(function (Request $request, array $headers) {
                    return response()->json([
                        'status' => 429,
                        'message' => 'Limite atteinte . Veuillez réessayer dans '.$headers['Retry-After'].' secondes.' ,
                        //'retry_after' => $headers['Retry-After'] ?? null,
                        //'limit' => $headers['X-RateLimit-Limit'] ?? null,
                        //'remaining' => $headers['X-RateLimit-Remaining'] ?? null,
                    ], 429);
                }),
                Limit::perMinute(5, 5)->response(function (Request $request, array $headers) { // Corrigé : perSecond -> perSeconds
                    return response()->json([
                        'status' => 429,
                        'message' => 'Limite atteinte . Veuillez réessayer dans '.$headers['Retry-After'].' secondes.' ,
                    ], 429);
                }),
            ];
        });
    }
}
