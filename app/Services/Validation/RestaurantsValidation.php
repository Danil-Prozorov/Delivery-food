<?php

namespace App\Services\Validation;

use App\Modules\Pub\Restaurants\Models\Orders;
use App\Modules\Pub\Restaurants\Models\Restaurant;
use App\Modules\Pub\Restaurants\Models\Restaurants_products as Product;

class RestaurantsValidation
{
    public function restaurantExist($restar_id) // Method jast chek exist eny restaurant with this id. Response TRUE||FALSE
    {
        return self::restaurantAndProductExist($restar_id,'rest');
    }

    public static function restaurantProductExist($prod_id) // Method check exist product with this id. Response TRUE||FALSE
    {
        return self::restaurantAndProductExist($prod_id,'prod');
    }

    protected function restaurantAndProductExist($id,$type)
    {
        if($type == 'prod'){

          if(!empty(Product::find($id))) {
              return true;
          }

          return false;
        }

        if($type == 'rest'){

            if(!empty(Restaurant::find($id))) {
                return true;
            }

            return false;
        }
    }
}
