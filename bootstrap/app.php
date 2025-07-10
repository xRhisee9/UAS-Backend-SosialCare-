<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RoleMiddleware; // Impor RoleMiddleware Anda di sini

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Daftarkan alias middleware kustom Anda di sini.
        // Ini adalah cara yang direkomendasikan di Laravel 12.
        $middleware->alias([
            'role' => RoleMiddleware::class, // Ini adalah pendaftaran alias 'role'
        ]);

        // Anda juga dapat mendaftarkan middleware global atau kelompok di sini.
        // Contoh:
        // $middleware->web(append: [
        //     \App\Http\Middleware\VerifyCsrfToken::class,
        // ]);
        //
        // $middleware->api(prepend: [
        //     \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Anda dapat menambahkan penanganan pengecualian kustom di sini.
        // Contoh:
        // $exceptions->dontReport([
        //     \Illuminate\Auth\AuthenticationException::class,
        // ]);
    })->create();