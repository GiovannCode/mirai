<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GatewayService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

        $this->app->singleton('gateway', function () {
            return new GatewayService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
