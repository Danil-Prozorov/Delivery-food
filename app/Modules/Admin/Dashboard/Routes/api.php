<?php

Route::group(['prefix' => 'dashboards', 'middleware' => []], function () {
    Route::get('/', 'Api\DashboardController@index')->name('api.dashboards.index');
    Route::post('/', 'Api\DashboardController@store')->name('api.dashboards.store');
    Route::get('/{dashboard}', 'Api\DashboardController@show')->name('api.dashboards.read');
    Route::put('/{dashboard}', 'Api\DashboardController@update')->name('api.dashboards.update');
    Route::delete('/{dashboard}', 'Api\DashboardController@destroy')->name('api.dashboards.delete');
});