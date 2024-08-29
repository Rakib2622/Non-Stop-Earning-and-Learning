<?php

use App\Http\Middleware\AuthGate;
use App\Http\Middleware\CheckUserStatus;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'is_active' => CheckUserStatus::class
        ]);

        $middleware->alias([
            'permission' => AuthGate::class
        ]);

        $middleware->alias([
            'role' => RoleMiddleware::class
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
