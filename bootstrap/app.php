<?php

use Illuminate\Foundation\Application;
use \Illuminate\Console\Scheduling\Schedule ;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Modules\AdminBase\Jobs\UnbanExpiredBansJob;
use Spatie\Permission\Middleware\PermissionMiddleware;
use Spatie\Permission\Middleware\RoleMiddleware;
use Spatie\Permission\Middleware\RoleOrPermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->alias([
            'permission' => PermissionMiddleware::class,
            'role' => RoleMiddleware::class,
            'role_or_permission' => RoleOrPermissionMiddleware::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            '/webhook/stripe',
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions): void {

    })->withSchedule(function (Schedule $schedule):void{

        $schedule->job( UnbanExpiredBansJob::class)->hourly();
        $schedule->job( \Modules\AdminBase\Jobs\CleanExpiredSessions::class)->everyFiveSeconds();

    })->create();
