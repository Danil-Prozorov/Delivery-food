<?php

namespace App\Modules\Pub\Cart\Controllers;

use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Validation\CartValidation;
use App\Services\Requests\CartRequests;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $user = $user->find(Auth::id());
        return view('Pub.Cart.index',compact('user'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
          'item_id'   => 'required',
          'restar_id' => 'required'
        ]);

        if(!RestaurValid::restaurantExist($data['restar_id']) && !RestaurValid::restaurantProductExist($data['item_id'])){
          return Response::notFound();
        }elseif(!Auth::user()){
          return Response::notFound(['error'=>'User not authorized']);
        }elseif(CartValidation::existInCart($data['item_id'],Auth::id())){
          return Response::notFound(['error' => 'Item already added'],$data['item_id']);
        }

        $product = Restaurants_products::find($data['item_id']);

        $data = array(
          'user_id'       => Auth::id(),
          'product_id'    => $data['item_id'],
          'product_name'  => $product['product_name'],
          'product_count' => 1,
          'price'         => $product['price']
        );

        Cart::create($data);

        return Response::success([$data['product_id']]);
    }

    public function update(Request $request,$id)
    {
      $data = $request->validate([
        'product_id' => 'required',
        'id'         => 'required',
        'operation'  => 'required',
      ]);

      $user_id = Auth::id();
      return CartValidation::chooseOperation($data['operation'],$user_id,$request,$id);
    }

}
