<?php
namespace App\Modules\Pub\Restaurants\Controllers;

use App\Modules\Pub\restaurants\Models\Restaurant;
use App\Modules\Admin\User\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
  public function index(User $user)
  {
    $user = $user->find(Auth::id());
    $fullCost = 0;

    foreach ($user->cart as $item) {
      $fullCost += $item->price*$item->product_count;
    }

    return view('Pub.Order.index',compact('user','fullCost'));
  }

  public function show()
  {

  }

  public function create()
  {

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
