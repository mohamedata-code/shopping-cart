<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class repositoryServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Http\Interfaces\ShoppingCartRepositoryInterface',
            'App\Http\Repositories\ShoppingCartRepository'
        );


        $this->app->bind(
            'App\Http\Interfaces\ProductRepositoryInterface',
            'App\Http\Repositories\ProductRepository'
        );

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
