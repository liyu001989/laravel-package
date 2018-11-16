<?php

namespace App\Providers;

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
        \API::error(function(\Illuminate\Auth\AuthenticationException $exception) {
            abort(401, 'Unauthenticated');
        });

        app('Dingo\Api\Transformer\Factory')->setAdapter(function ($app) {
            $fractal = new \League\Fractal\Manager;
            // 自定义的和fractal提供的
            //$serializer = new \League\Fractal\Serializer\DataArraySerializer();
            // $serializer = new \League\Fractal\Serializer\ArraySerializer();
            $serializer = new \League\Fractal\Serializer\JsonApiSerializer();
            $fractal->setSerializer($serializer);
            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });
    }
}
