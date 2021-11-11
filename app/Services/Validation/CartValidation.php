<?php

namespace App\Services\Validation;

use App\Modules\Pub\Cart\Models\Cart;

class CartValidation
{
    public static function existInCart($item_id,$user_id)
    {
      $request = Cart::all()
                        ->where('user_id','=',$user_id)
                        ->where('product_id','=',$item_id);

      if(!empty($request)){
        return true;
      }

      return false;
    }
}
