<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));


            //*Agregamos la ruta de admin al archivo para que reconzca como un archivo de rutas
            Route::middleware('web', 'auth')
                ->name('admin.')
                ->prefix('admin')
                ->namespace($this->namespace)
                ->group(base_path('routes/admin.php'));

            //*Agregamos la ruta de instructor al archivo para que reconzca como un archivo de rutas
            Route::middleware('web', 'auth')
            ->name('instructor.')
            ->prefix('instructor')
            ->namespace($this->namespace)
            ->group(base_path('routes/instructor.php'));

             //*Agregamos la ruta de pago al archivo para que reconzca como un archivo de rutas
             Route::middleware('web', 'auth')
             ->name('payment.')
             ->prefix('payment')
             ->namespace($this->namespace)
             ->group(base_path('routes/payment.php'));
        });
    }
}
