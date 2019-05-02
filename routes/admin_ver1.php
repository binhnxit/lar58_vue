<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/7/19
 * Time: 5:04 PM
 */

Route::post('/login', 'AuthController@issueToken')->name('login');
Route::middleware(['auth:api', 'role:admin'])->group(function () {
        Route::get('logout', 'AuthController@logout')->name('api.admin.logout');

        Route::prefix('users')->name('.user.')->group(function () {
            Route::get('/', 'UserController@listAll')->name('list');
            Route::post('/', 'UserController@create')->name('add');
            Route::get('/me', 'AuthController@me')->name('me');
            Route::get('check-email', 'UserController@checkEmail')->name('check-mail');
        });
});
