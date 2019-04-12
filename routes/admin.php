<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/7/19
 * Time: 5:04 PM
 */

Route::get('/login', 'AuthController@getLogin')->name('admin.login');
Route::post('/api/login', 'AuthController@login')->name('api.admin.login');
Route::middleware('auth.admin')->group(function () {

    Route::prefix('api')->group(function () {
        Route::get('me', 'AuthController@me')->name('api.admin.me');
        Route::get('logout', 'AuthController@logout')->name('api.admin.logout');
        Route::get('users', 'UserController@listAll')->name('api.admin.users.list');
        Route::post('users', 'UserController@create')->name('api.admin.users.add');
    });

    // Catch all route...
    Route::get('/{view?}', 'DashboardController@index')->where('view', '(.*)')->name('admin.dashboard.index');
});
