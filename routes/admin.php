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
    Route::get('/{view?}', 'DashboardController@index')->where('view', '(.*)')->name('admin.dashboard.index');
});
