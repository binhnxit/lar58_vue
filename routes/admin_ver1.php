<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/7/19
 * Time: 5:04 PM
 */

Route::post('/login', 'AuthController@login')->name('login');
Route::middleware('auth.admin')->group(function () {

    Route::prefix('api')->group(function () {
        Route::get('me', 'AuthController@me')->name('api.admin.me');
        Route::get('logout', 'AuthController@logout')->name('api.admin.logout');

        Route::prefix('users')->name('api.admin.users.')->group(function () {
            Route::get('/', 'UserController@listAll')->name('list');
            Route::post('/', 'UserController@create')->name('add');
            Route::get('check-email', 'UserController@checkEmail')->name('check-mail');
        });
    });

});

