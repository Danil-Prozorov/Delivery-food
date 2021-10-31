<?php

Route::group(['prefix' => 'restaurants', 'middleware' => []], function () {
    Route::get('/', 'Api\RestaurantsController@index')->name('api.restaurants.index');
    Route::post('/', 'Api\RestaurantsController@store')->name('api.restaurants.store');
    Route::get('/{restaurant}', 'Api\RestaurantsController@show')->name('api.restaurants.read');
    Route::put('/{restaurant}', 'Api\RestaurantsController@update')->name('api.restaurants.update');
    Route::delete('/{restaurant}', 'Api\RestaurantsController@destroy')->name('api.restaurants.delete');
});