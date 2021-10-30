<?php

namespace App\Modules\Pub\Cart\Controllers;

use App\Modules\Pub\Cart\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

}
