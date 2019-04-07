<?php

namespace App\Providers;

use Spatie\Flash\Message;
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
        \Spatie\Flash\Flash::levels([
            'success' => 'alert-success',
            'warning' => 'alert-warning',
            'danger' => 'alert-danger',
        ]);

        \Spatie\Flash\Flash::macro('foobar', function(string $message) {
            return $this->flashMessage(new Message($message, 'foobar alert-warning'));
        });
            }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
