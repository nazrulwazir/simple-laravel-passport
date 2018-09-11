<?php

Route::post('/register', 'Auth\ApiAuthController@register')->name('register');
Route::post('/login', 'Auth\ApiAuthController@login')->name('login');


Route::group([
      'middleware' => 'auth:api'
    ], function() {

    Route::apiResource('user', 'UserController');
});