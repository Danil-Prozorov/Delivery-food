<?php
namespace App\Modules\Pub\Restaurants\Controllers;

use App\Modules\Admin\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Traits\Response\ResponseJSON;
use App\Services\Requests\OrderRequests;

class OrderController extends Controller
{
    use ResponseJSON;

    public function index(User $user)
    {
      $user = $user->find(Auth::id());
      $fullCost = OrderRequests::countTotalPrice($user);

      return view('Pub.Order.index', compact('user', 'fullCost'));
    }

    public function show(User $user)
    {
        $order        = new OrderRequests();
        $user         = $user->find(Auth::id());
        $fullCost     = OrderRequests::countTotalPrice($user);
        $orders       = $order->getAllOrders(Auth::id());
        $orderDetails = $order->getAllOrderDetails(Auth::id());

         return view('Pub.Order.show', compact('user', 'fullCost', 'orders', 'orderDetails'));
    }

    public function create(Request $request)
    {
      $data = $request->validate([
          'address'     => 'required',
          'user_id'     => 'required',
          'total_price' => 'required',
      ]);

      if (!($data['user_id'] == Auth::id())) {
        return self::badRequest();
      }

      $order = new OrderRequests;

      return $order->orderCreate($request);
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
