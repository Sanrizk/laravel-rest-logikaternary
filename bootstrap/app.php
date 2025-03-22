<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // append middleware stack
        // $middleware->append([class middleware]);

        // except csrf
        $middleware->validateCsrfTokens(except: [
            // 'stripe/*',
            // 'http://example.com/foo/bar',
            // 'http://example.com/foo/*',

            'http://localhost:8000/tokens/create',
            'http://localhost:8000/user',
            'http://localhost:8000/api/*',

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
