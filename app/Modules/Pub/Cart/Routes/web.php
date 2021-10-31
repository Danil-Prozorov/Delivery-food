<?php

Route::group(['prefix' => 'cart', 'middleware' => []], function () {
    Route::get('/', 'CartController@index')->name('cart.index');
});
