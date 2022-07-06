<?php

/*
* Furnitures
 */
Route::group([ 'prefix' => 'furnitures', 'middleware' => ['auth']], function () {

    Route::get(
        '{furnituresID}/checkout',
        [ 'as' => 'checkout/furnitures', 'uses' => 'FurnituresController@getCheckout' ]
    );
    Route::post(
        '{furnituresID}/checkout',
        [ 'as' => 'checkout/furnitures', 'uses' => 'FurnituresController@postCheckout' ]
    );

    Route::get(
        '{furnituresID}/checkin/{backto?}',
        [ 'as' => 'checkin/furnitures', 'uses' => 'FurnituresController@getCheckin' ]
    );
    Route::post(
        '{furnituresID}/checkin/{backto?}',
        [ 'as' => 'checkin/furnitures', 'uses' => 'FurnituresController@postCheckin' ]
    );

});

Route::resource('furnitures', 'FurnituresController', [
    'middleware' => ['auth'],
    'parameters' => ['furnitures' => 'furnitures_id']
]);
