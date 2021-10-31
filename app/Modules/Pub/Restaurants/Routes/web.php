<?php

Route::group(['prefix' => 'restaurants', 'middleware' => []], function () {
    Route::get('/', 'RestaurantsController@index')->name('restaurants.index');
    Route::get('/create', 'RestaurantsController@create')->name('restaurants.create');
    Route::post('/', 'RestaurantsController@store')->name('restaurants.store');
    Route::get('/{restaurant}', 'RestaurantsController@show')->name('restaurants.read');
    Route::get('/edit/{restaurant}', 'RestaurantsController@edit')->name('restaurants.edit');
    Route::put('/{restaurant}', 'RestaurantsController@update')->name('restaurants.update');
    Route::delete('/{restaurant}', 'RestaurantsController@destroy')->name('restaurants.delete');
});