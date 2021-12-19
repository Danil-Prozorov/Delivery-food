<?php

namespace App\Modules\Pub\Cart\Controllers;

use App\Modules\Admin\User\Models\User;
use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Validation\CartValidation;
use App\Services\Validation\RestaurantsValidation as RestaurValid;
use App\Modules\Pub\Restaurants\Models\Restaurants_products;
use App\Services\Traits\Response\ResponseJSON;

class CartController extends Controller
{
    use ResponseJSON;

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

    public function store(Request $request)  // Here we get data from AJAX request
    {
        $data = $request->validate([ // Validate it with basic Laravel method for Requests
          'item_id'   => 'required',
          'restar_id' => 'required'
        ]);

        if (!RestaurValid::restaurantExist($data['restar_id']) && !RestaurValid::restaurantProductExist($data['item_id'])) { // Checking exist restaurant and product in this restaurant
          return self::notFound(); // If no, then return JSON response with code 404 not found
        } elseif (!Auth::user()) { //If user anauthorized return JSON 404 code again
          return self::notFound(['error'=>'User not authorized']);
        } elseif (CartValidation::existInCart($data['item_id'], Auth::id())) { // Checking, exist in our cart item with the same ID and if it's true, return 404
          return self::notFound(['error' => 'Item already added'], $data['item_id']);
        }

        $product = Restaurants_products::find($data['item_id']); // Select all information about product

        $data = array( // here compact data for insert it in new cart model
          'user_id'       => Auth::id(),
          'product_id'    => $data['item_id'],
          'product_name'  => $product['product_name'],
          'image_path'    => $product['image_path'],
          'product_count' => 1,
          'price'         => $product['price']
        );

        Cart::create($data); // Create row in DB with data what we compact in variable $data

        return self::success([$data['product_id']]); // return JSON response with status 200 and item id what we added in DB for let JS hide function for send this request again
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

    public function destroy($id) {
      $item = Cart::find($id);

      if(!CartValidation::sameId($item['user_id'],Auth::id())) {
        return self::notFound();
      }

      $item->delete();
      return self::success(['id' => $id]);
    }

}
