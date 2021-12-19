<?php
namespace App\Modules\Pub\Restaurants\Controllers;

use App\Modules\Pub\restaurants\Models\Restaurant;
use App\Modules\Pub\Restaurants\Models\Orders;
use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Traits\Response\ResponseJSON;
use App\Services\Validation\CartValidation;
use App\Services\Requests\OrderRequests;

class OrderController extends Controller
{
    use ResponseJSON;

    public function index(User $user)
    {
      $user = $user->find(Auth::id());
      $fullCost = 0;

      foreach ($user->cart as $item) {
        $fullCost += $item->price*$item->product_count;
      }

      return view('Pub.Order.index',compact('user', 'fullCost'));
    }

    public function show()
    {

    }

    public function create(Request $request)
    {
      $data = $request->validate([
        'adres'   => 'required',
        'user_id' => 'required',
      ]);

      if (!CartValidation::sameId($data['user_id'], Auth::id())) {
        return self::notFound();
      }

      return OrderRequests::orderCreate($request);
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
