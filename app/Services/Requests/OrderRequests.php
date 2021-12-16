<?php

namespace App\Services\Requests;

use App\Modules\Pub\Restaurants\Models\Orders;
use App\Modules\Pub\Restaurants\Models\Orders_details;
use App\Services\Interfaces\OrderRequestInterface;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Services\Traits\Response\ResponseJSON;

class OrderRequests implements OrderRequestInterface
{
  use ResponseJSON;

  protected $cart;

  public function __construct()
  {
      $this->cart = Cart::all()
                    ->where('user_id', '=', Auth::id());
  }

  public function orderCreate($request)
  {
      $dataOrder = array(
          'user_id'     => Auth::id(),
          'total_price' => $request['total_price'],
          'adres'       => $request['adres'],
          'status'      => "In proccess",
      );

      Orders::create($dataOrder);

      $orderCreated = Orders::all()->where('user_id', '=' ,Auth::id());
      $orderCreated = $orderCreated->last()->id;

      self::createOrderDetails($this->cart, array(), $orderCreated);
      self::cleanCart($this->cart,array());

      return self::success();
  }

  protected function createOrderDetails($array, $results, $orderId)
  {
     if (count($array) == count($results)) {
       return $results;
     } else {
       $resultCount = count($results);

       $data = array(
           'order_id'   => $orderId,
           'item_name'  => $array[$resultCount]['product_name'],
           'item_count' => $array[$resultCount]['product_count'],
           'price'      => $array[$resultCount]['price'],
       );

       Orders_details::create($data);
       array_push($results,$data);
       return $this->createOrderDetails($array,$results,$orderId);
     }
  }

  protected function cleanCart($array,$result)
  {
    $counterResult = count($result);
    if (count($array) == $counterResult) {

    } elseif (count($array) > $counterResult) {
        $array[$counterResult]->delete();

        array_push($result,0);
        return $this->cleanCart($array,$result);
    }
  }

  public function cancelOrder()
  {

  }

  public function completeOrder()
  {
      // TODO: Implement completeOrder() method.
  }

  public function getOrderDetails()
  {
      // TODO: Implement getOrderDetails() method.
  }
}
