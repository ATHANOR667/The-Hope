<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Gate;
use Laravel\Horizon\Horizon;
use Laravel\Horizon\HorizonApplicationServiceProvider;

class HorizonServiceProvider extends HorizonApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        // Horizon::routeSmsNotificationsTo('15556667777');
        Horizon::routeMailNotificationsTo('example@example.com');
        // Horizon::routeSlackNotificationsTo('slack-webhook-url', '#channel');


    }

    /**
     * Register the Horizon gate.
     *
     * This gate determines who can access Horizon in non-local environments.
     */
    protected function gate(): void
    {
        Gate::define('viewHorizon', function (?Authenticatable $user) {
            Log:info($user);
            dd($user);
            return $user ; /** &&             $user->hasPermissionTo('use-horizon','admin');*/

        });


    }

    /**
     *
     *
     * "timacdonald/pulse-validation-errors": "^1.5" ,
     * "hosmelq/laravel-pulse-schedule": "^1.0" ,
     * "maantje/pulse-database": "^0.3.0" ,
     * "aaronfrancis/pulse-outdated": "^0.1.2" ,
     * "denniseilander/pulse-log-files": "^0.3.0"
     *
     */
}
