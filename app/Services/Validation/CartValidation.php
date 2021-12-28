<?php

namespace App\Services\Validation;

use App\Modules\Pub\Cart\Models\Cart;
use App\Services\Interfaces\CartValidationInterface;

class CartValidation implements CartValidationInterface
{
    public static function existInCart($item_id, $user_id)
    {
      $request = Cart::all()
                        ->where('user_id', '=', $user_id)
                        ->where('product_id', '=', $item_id);

      $state = $request->first();
      if ($state != null) {
        return true;
      }

      return false;
    }

    public function sameId($first_id, $second_id)
    {
      if($first_id == $second_id) {
        return true;
      }

      return false;
    }

    public function cartEmpty()
    {

    }
}
