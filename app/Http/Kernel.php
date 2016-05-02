<?php

// App
// Http
namespace App\Http;

// Http kernel
use Illuminate\Foundation\Http\Kernel as HttpKernel;

// class Kernel
class Kernel extends HttpKernel
{
  /**
   * The application's global HTTP middleware stack.
   *
   * These middleware are run during every request to your application.
   *
   * @var array
   */
  // Global middle ware
  // Illumninate
  // Foundation
  // Http
  // Middleware
  // CheckForMaintenanceMode
  protected $middleware = [
      \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
  ];

  /**
   * The application's route middleware groups.
   *
   * @var array
   */
  protected $middlewareGroups = [
    'web' => [
      // encrypted cookie
      \App\Http\Middleware\EncryptCookies::class,

      // queue cookie to response
      \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,

      
      \Illuminate\Session\Middleware\StartSession::class,
      \Illuminate\View\Middleware\ShareErrorsFromSession::class,
      // Hak
      // https://scotch.io/tutorials/token-based-authentication-for-angularjs-and-laravel-apps
      //\App\Http\Middleware\VerifyCsrfToken::class,
    ],

    'api' => [
      'throttle:60,1',
    ],
  ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
      'auth' => \App\Http\Middleware\Authenticate::class,
      'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
      'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
      'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
      'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
      // Hak
      'jwt.auth' => \Tymon\JWTAuth\Middleware\GetUserFromToken::class,
      'jwt.refresh' => \Tymon\JWTAuth\Middleware\RefreshToken::class,
    ];
}
