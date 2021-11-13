<?php

namespace App\Modules\Pub\Cart\Controllers;

use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Response\ResponseService as Response;
use App\Services\Validation\RestaurantsValidation as RestaurValid;
use App\Modules\Pub\Restaurants\Models\Restaurants_products;
use App\Services\Validation\CartValidation;

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
    public function index()
    {
        return view('Pub.Cart.index');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
          'item_id'   => 'required',
          'restar_id' => 'required'
        ]);

        if(!RestaurValid::restaurantExist($data['restar_id']) && !RestaurValid::restaurantProductExist($data['item_id'])){
          return Response::notFound();
        }elseif(CartValidation::existInCart($data['item_id'],Auth::id())){
          return Response::notFound();
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

        return Response::success();
    }

}
