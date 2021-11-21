<?php

namespace App\Services\Validation;

use App\Modules\Pub\Cart\Models\Cart;
use App\Services\Requests\CartRequests;

class CartValidation
{
    public static function existInCart($item_id,$user_id)
    {
      $request = Cart::all()
                        ->where('user_id','=',$user_id)
                        ->where('product_id','=',$item_id);

      $state = $request->first();
      if($state != null){
        return true;
      }

      return false;
    }

    public static function sameId($first_id,$second_id)
    {
      if($first_id == $second_id) {
        return true;
      }

      return false;
    }

    public static function chooseOperation($oper,$user_id,$request,$id)
    {
      if($oper === "increase") {
        if(self::existInCart($request['product_id'],$user_id)) {
          return CartRequests::counterIncrease($request,$id);
        }
      }elseif($oper === "reduce") {
        if(self::existInCart($request['product_id'],$user_id)) {
          return CartRequests::counterReduce($request,$id);
        }
      }

    }
}
