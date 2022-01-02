<?php

namespace App\Modules\Pub\restaurants\Controllers;

use App\Modules\Pub\restaurants\Models\Restaurant;
use App\Services\Requests\CartRequests;
use Illuminate\Http\Request;
use App\Modules\Pub\Cart\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        return view('Pub.restaurants.index', compact('restaurant'));
    }

    /**
     * Create of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Pub\restaurants\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('Pub.restaurants.show', compact('restaurant'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modules\Pub\restaurants\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modules\Pub\restaurants\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modules\Pub\restaurants\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
