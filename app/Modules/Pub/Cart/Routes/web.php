<?php

Route::group(['prefix' => 'carts', 'middleware' => []], function () {
    Route::get('/', 'CartController@index')->name('carts.index');
    Route::get('/create', 'CartController@create')->name('carts.create');
    Route::post('/', 'CartController@store')->name('carts.store');
    Route::get('/{cart}', 'CartController@show')->name('carts.read');
    Route::get('/edit/{cart}', 'CartController@edit')->name('carts.edit');
    Route::put('/{cart}', 'CartController@update')->name('carts.update');
    Route::delete('/{cart}', 'CartController@destroy')->name('carts.delete');
});