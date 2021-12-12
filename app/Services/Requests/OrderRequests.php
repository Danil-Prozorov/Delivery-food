<?php

namespace App\Services\Requests;

use App\Modules\Pub\Restaurants\Models\Orders;
use App\Modules\Pub\Restaurants\Models\Orders_details;
use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Services\Response\ResponseService as Response;

class OrderRequests
{
  public static function orderCreate($request)
  {
    return self::makeOrder($request);
  }

  protected static function makeOrder($request)
  {
    $cart = Cart::all()
                  ->where('user_id', '=', Auth::id());
    $dataOrder = array(
      'user_id'     => Auth::id(),
      'total_price' => $request['total_price'],
      'adres'       => $request['adres'],
      'status'      => "In proccess",
    );

    Orders::create($dataOrder);

    $orderCreated = Orders::all()->where('user_id', '=' ,Auth::id());
    $orderCreated = $orderCreated->last()->id;

    self::createOrderDetails($cart, array(), $orderCreated);
    self::cleanCart($cart,array());

    return Response::success();
  }

  protected static function createOrderDetails($array, $results, $orderId)
  {
    if(count($array) == count($results)){
      return $results;
    }else{
      $resultCount = count($results);

      $data = array(
          'order_id'   => $orderId,
          'item_name'  => $array[$resultCount]['product_name'],
          'item_count' => $array[$resultCount]['product_count'],
          'price'      => $array[$resultCount]['price'],
      );
      Orders_details::create($data);
      array_push($results,$data);
      return self::createOrderDetails($array,$results,$orderId);
    }
  }

  protected static function cleanCart($array,$result)
  {
    $counterResult = count($result);
    if (count($array) == $counterResult) {

    } elseif(count($array) > $counterResult) {
        $array[$counterResult]->delete();

        array_push($result,0);
        return self::cleanCart($array,$result);
    }
  }
}
