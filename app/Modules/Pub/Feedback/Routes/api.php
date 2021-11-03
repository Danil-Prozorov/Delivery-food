<?php

Route::group(['prefix' => 'feedback', 'middleware' => []], function () {
    Route::get('/', 'Api\FeedbackController@index')->name('api.feedback.index');
    Route::post('/', 'Api\FeedbackController@store')->name('api.feedback.store');
    Route::get('/{feedback}', 'Api\FeedbackController@show')->name('api.feedback.read');
    Route::put('/{feedback}', 'Api\FeedbackController@update')->name('api.feedback.update');
    Route::delete('/{feedback}', 'Api\FeedbackController@destroy')->name('api.feedback.delete');
});