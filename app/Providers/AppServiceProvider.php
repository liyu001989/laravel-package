<?php

namespace App\Providers;

use Pine\BladeFilters\BladeFilters;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BladeFilters::macro('combine', function ($value, $one, $two) {
            return $value.' '.$one.' '.$two;
        });
    }
}
