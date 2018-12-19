<?php

namespace App\Providers;

use Studio\Totem\Totem;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Totem::auth(function($request) {
            return true;
            // return true / false . For e.g.
            // return Auth::check();
        });
    }
}
