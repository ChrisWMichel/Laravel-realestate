<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
//use App\Http\Middleware\VerifyCsrfToken;
use Litespeed\LSCache\LSCacheMiddleware;
use Litespeed\LSCache\LSTagsMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            \App\Http\Middleware\HandleInertiaRequests::class,
            \Illuminate\Http\Middleware\AddLinkHeadersForPreloadedAssets::class,
            LSCacheMiddleware::class,
            LSTagsMiddleware::class,
        ]);

        $middleware->validateCsrfTokens(except: [
            '/logout',
             '/realtor/listing/*',
         ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        return '/logout';
    })->create();
