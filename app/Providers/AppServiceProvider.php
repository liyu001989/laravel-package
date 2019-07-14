<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Validation\Factory;
use Illuminatech\Validation\Composite\DynamicCompositeRule;

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
        $this->app->extend('validator', function (Factory $validatorFactory) {
            $validatorFactory->extend('password', function ($attribute, $value) {
                return (new DynamicCompositeRule(['string', 'min:6', 'max:20', 'alpha_num']))->passes($attribute, $value);
            });

            return $validatorFactory;
        });
    }
}
