<?php

namespace App\Providers;

use App\Services\Validation\RestaurantsValidation;
use Illuminate\Support\ServiceProvider;

class RestaurantValidationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app\Services\Interfaces\RestaurantValidationInterface', function($app) {
            return new RestaurantsValidation();
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
