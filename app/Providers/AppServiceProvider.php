<?php

namespace App\Providers;

use App\Http\Middleware\IsAdmin;
use App\Http\Middleware\IsUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
            Route::aliasMiddleware('is_admin', IsAdmin::class);
            Route::aliasMiddleware('is_user', IsUser::class);
    }


}
