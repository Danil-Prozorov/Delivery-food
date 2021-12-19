<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Requests\OrderRequests;

class OrderRequestsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('app\Services\Interfaces\CartValidationInterface', function($app) {
            return new OrderRequests();
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
