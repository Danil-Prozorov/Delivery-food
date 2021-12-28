<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Validation\CartValidation;

class CartValidationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app\Services\Interfaces\CartValidationInterface', function($app) {
            return new CartValidation();
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
