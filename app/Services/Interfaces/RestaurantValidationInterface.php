<?php

namespace App\Services\Interfaces;

interface RestaurantValidationInterface
{
    public function restaurantExist($restar_id);

    public static function restaurantProductExist($prod_id);

}
