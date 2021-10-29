<?php

Route::group(['prefix' => 'carts', 'middleware' => []], function () {
    Route::get('/', 'Api\CartController@index')->name('api.carts.index');
    Route::post('/', 'Api\CartController@store')->name('api.carts.store');
    Route::get('/{cart}', 'Api\CartController@show')->name('api.carts.read');
    Route::put('/{cart}', 'Api\CartController@update')->name('api.carts.update');
    Route::delete('/{cart}', 'Api\CartController@destroy')->name('api.carts.delete');
});