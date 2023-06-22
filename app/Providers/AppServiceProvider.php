<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    public function boot()
    {
        Config::set('constants', require config_path('constants.php'));
    }
    /**
     * Bootstrap any application services.
     */

}
