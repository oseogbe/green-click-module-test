<?php

namespace App\Providers;

use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the UserService as a singleton
        $this->app->singleton(UserService::class, function ($app) {
            return new UserService();
        });
    }

    public function boot()
    {
        //
    }
}
