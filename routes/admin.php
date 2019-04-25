<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/7/19
 * Time: 5:04 PM
 */

// Catch all route...
Route::get('/{view?}', 'DashboardController@index')
    ->where('view', '(.*)')
    ->name('admin.dashboard.index');
