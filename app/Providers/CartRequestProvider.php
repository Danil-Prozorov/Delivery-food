<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Requests\CartRequests;

class CartRequestProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app\Services\Interfaces\CartRequestInterface', function($app){
            return new CartRequests();
        });
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
