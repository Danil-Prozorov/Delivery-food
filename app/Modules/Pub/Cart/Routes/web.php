<?php

Route::group(['prefix' => 'cart', 'middleware' => []], function () {
    Route::get('/', 'CartController@index')->name('cart.index');
    Route::post('/', 'CartController@store')->name('cart.store');
    Route::patch('/item/{id}','CartController@update')->name('cart.update');
    Route::delete('/item/{id}','CartController@destroy')->name('cart.destroy');
});
