<?php

Route::group(['prefix' => 'restaurants', 'middleware' => []], function () {
    Route::get('/', 'RestaurantsController@index')->name('restaurants.index');
    Route::get('/create', 'RestaurantsController@create')->name('restaurants.create');
    Route::post('/', 'RestaurantsController@store')->name('restaurants.store');
    Route::get('/{restaurant}', 'RestaurantsController@show')->name('restaurants.show');
    Route::get('/edit/{restaurant}', 'RestaurantsController@edit')->name('restaurants.edit');
    Route::put('/{restaurant}', 'RestaurantsController@update')->name('restaurants.update');
    Route::delete('/{restaurant}', 'RestaurantsController@destroy')->name('restaurants.delete');
});

Route::group(['prefix' => 'cart','middleware' => ['auth']], function () {
  Route::get('/order','OrderController@index')->name('order.index');
  Route::post('/order','OrderController@create')->name('order.create');
});
