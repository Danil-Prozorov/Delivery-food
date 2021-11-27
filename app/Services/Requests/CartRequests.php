<?php

namespace App\Services\Requests;

use App\Modules\Pub\Cart\Models\Cart;
use App\Services\Response\ResponseService as Response;
use App\Services\Validation\CartValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartRequests
{

  public static function counterIncrease($request,$id)
  {
    $item = Cart::find($id);

    if(!CartValidation::sameId($item['user_id'],Auth::id())) {
      return Response::notFound();
    }

    $data = array(
      'product_count' => $item['product_count']+1,
    );

    $item->update($data);

    return Response::success();
  }

  public static function counterReduce($request,$id)
  {
    $item = Cart::find($id);

    if(!CartValidation::sameId($item['user_id'],Auth::id())) {
      return Response::notFound();
    }
    if($item['product_count'] <= 0) {
      return Response::notFound();
    }

    $data = array(
      'product_count' => $item['product_count']-1,
    );

    $item->update($data);

    return Response::success();
  }
}
