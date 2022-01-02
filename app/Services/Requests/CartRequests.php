<?php

namespace App\Services\Requests;

use App\Modules\Pub\Cart\Models\Cart;
use App\Services\Traits\Response\ResponseJSON;
use App\Services\Interfaces\CartRequestInterface;
use Illuminate\Support\Facades\Auth;

class CartRequests implements CartRequestInterface
{
  use ResponseJSON;

  public function counterIncrease($id)
  {
    $item = Cart::find($id);

    if (!($item['user_id'] == Auth::id())) {
      return self::notFound();
    }

    $data = array(
      'product_count' => $item['product_count']+1,
    );

    $item->update($data);

    return self::success();
  }

  public function counterReduce($id)
  {
    $item = Cart::find($id);

    if (!($item['user_id'] == Auth::id())) {
      return self::notFound();
    }

    if ($item['product_count'] <= 0) {
      return self::notFound();
    }

    $data = array(
      'product_count' => $item['product_count']-1,
    );

    $item->update($data);

    return self::success();
  }
}
