<?php


/*--------------------------------Login--------------------------------*/
Route::group(['middleware' => ['admin'],'prefix'=>'admin'], function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });

    Route::get('login', 'Backend\Auth\AuthController@getLogin');
    Route::post('login', 'Backend\Auth\AuthController@postLogin');
    
    Route::get('logout', 'Backend\Auth\AuthController@getLogout');
    Route::resource('brands', 'Backend\BrandsController');
});

/*--------------------------------Auth--------------------------------*/
Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin'], function () {
    Route::get('users', 'Backend\UsersController@index');
    Route::get('dashboard', 'Backend\DashboardController@index');
});
