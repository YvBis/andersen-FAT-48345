<?php

namespace App\Providers;

use App\Services\Interfaces\UserService;
use App\Services\AppUserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            UserService::class,
            AppUserService::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
