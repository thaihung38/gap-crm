<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->append(\App\Http\Middlewares\AddGlobalProcessId::class);
        $middleware->alias([
            'dispatchRequestEvent' => \App\Http\Middlewares\DispatchRequestEvent::class
        ]);
    })
    ->withCommands([
        __DIR__.'/../app/Console/IAM',
        __DIR__.'/../app/Console/Recruitment',
    ])
    ->withEvents([
        __DIR__.'/../app/Domains/*/Listeners',
    ])
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
