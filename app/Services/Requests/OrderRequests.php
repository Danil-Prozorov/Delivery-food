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
          'address'     => $request['address'],
          'status'      => "In proccess",
      );

      Orders::create($dataOrder);

      $orderCreated = Orders::all()->where('user_id', '=' ,Auth::id());
      $orderCreated = $orderCreated->last()->id;

      self::createOrderDetails($this->cart, array(), $orderCreated);
      self::cleanCart($this->cart,array());

      return self::success(['order_id' => $orderCreated]);
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
      // counter
      $counterResult = count($result);
      // if we delete all items then just do nothing
      if (count($array) == $counterResult) {

      } elseif (count($array) > $counterResult) { // else delete item and call method again
          $array[$counterResult]->delete();

          array_push($result,0);
          return $this->cleanCart($array,$result);
      }
  }

  public function cancelOrder($orderID)
  {
      // Find order
      $order = Orders::find($orderID)->first();
      // Validate user_id and id for authorized right now
      if (!($order['user_id'] == Auth::id())) {
          return self::badRequest(['error' => 'Incorrect ID for this session']);
      }
      // Checking order status
      if ($order['status'] == 'Delivered' || $order['status'] == 'Canceled') {
         return self::noContent();
      }
      // Update order status to 'Canceled'
      $order->update(['status' => 'Canceled']);
      // return
      return self::resetContent();
  }

  public function completeOrder($orderID)
  {
      // Find the order with the same orderID
      $order = Orders::where('id','=',$orderID)->get();

      // Validate ID
      if (!($order['user_id'] == Auth::id())) {
          return self::badRequest(['error' => 'Incorrect ID for this session']);
      }

      // Update order status
      $order->update(['status' => 'Delivered']);

      // return
      return self::resetContent();
  }

  public function getAllOrders($userID)
  {
      // Checking userID
      if (!($userID == Auth::id())) {
          return self::badRequest(['error' => 'Incorrect ID for this session']);
      }
      // If ID the same then...
      $orders = Orders::all()->where('user_id', '=', $userID);
      return $orders;
  }

  public function getOrder($userID, $orderID)
  {
      // Validate userID
      if (!($userID == Auth::id())) {
         return self::badRequest(['error' => 'Incorrect ID for this session']);
      }
      // Find order
      $order = Orders::find($orderID)->first();
      // return order
      return $order;

  }

  public function getOrderDetails($orderID) // get userID and orderID
  {
      //get data form DB
      $orderData = Orders_details::where('order_id', '=', $orderID)->get();

      // check authentication
      if (!Auth::user()) {
        self::noContent();
      }

      //return it
      return $orderData;
  }

  public function getAllOrderDetails($userID)
  {
      // Get data from DB
      $orderData = Orders_details::where('user_id', '=', $userID)->get();

      // return result
      return $orderData;
  }
}
