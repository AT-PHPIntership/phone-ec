<?php


/*--------------------------------Login--------------------------------*/
Route::group(['middleware' => ['admin'],'prefix'=>'admin'], function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });

    Route::get('login', 'Backend\Auth\AuthController@getLogin');
    Route::post('login', 'Backend\Auth\AuthController@postLogin');

    Route::get('logout', 'Backend\Auth\AuthController@logout');
});

/*--------------------------------Auth--------------------------------*/
Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin'], function () {
    Route::get('dashboard', 'Backend\DashboardController@index');
    Route::resource('brands', 'Backend\BrandsController', ['except'=>['show']]);
    Route::resource('products', 'Backend\ProductsController', ['except'=>'show']);
    Route::resource('admin/users', 'Backend\UsersController');
    Route::resource('rating', 'Backend\RatingController', ['only' => ['index','destroy']]);
});
