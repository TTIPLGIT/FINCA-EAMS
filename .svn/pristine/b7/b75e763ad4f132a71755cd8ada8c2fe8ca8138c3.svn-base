<?php

/*
* Electronics
 */
Route::group([ 'prefix' => 'electronics', 'middleware' => ['auth']], function () {

    Route::get(
        '{electronicsID}/checkout',
        [ 'as' => 'checkout/electronics', 'uses' => 'ElectronicsController@getCheckout' ]
    );
    Route::post(
        '{electronicsID}/checkout',
        [ 'as' => 'checkout/electronics', 'uses' => 'ElectronicsController@postCheckout' ]
    );

    Route::get(
        '{electronicsID}/checkin/{backto?}',
        [ 'as' => 'checkin/electronics', 'uses' => 'ElectronicsController@getCheckin' ]
    );
    Route::post(
        '{electronicsID}/checkin/{backto?}',
        [ 'as' => 'checkin/electronics', 'uses' => 'ElectronicsController@postCheckin' ]
    );

});

Route::resource('electronics', 'ElectronicsController', [
    'middleware' => ['auth'],
    'parameters' => ['electronics' => 'electronics_id']
]);
