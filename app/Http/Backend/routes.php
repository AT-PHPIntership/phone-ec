<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
/**
 * Route for Backend
 */
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'DashboardController@index')->name('admin');
});

Route::group(['middleware' => ['admin']], function () {

    // Authentication routes...
    Route::get('login', 'Auth\AuthController@getLogin')->name('admin.login');
    Route::post('login', 'Auth\AuthController@postLogin')->name('admin.login');
    Route::get('logout', 'Auth\AuthController@getLogout')->name('admin.logout');

});
