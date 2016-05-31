<?php


/*--------------------------------Login--------------------------------*/
Route::group(['prefix'=>'admin'], function () {
    Route::get('/', function () {
        return redirect('admin/login');
    });

    Route::get('login', 'Backend\Auth\AuthController@getLogin');
    Route::post('login', 'Backend\Auth\AuthController@postLogin');

    Route::get('logout', 'Backend\Auth\AuthController@logout');
});

/*--------------------------------Auth--------------------------------*/
Route::group(['middleware' => ['auth:admin','authorization'],'prefix'=>'admin'], function () {
    Route::get('dashboard', 'Backend\DashboardController@index')->name('dashboard');
    Route::resource('brands', 'Backend\BrandsController', ['except'=>['show']]);
    Route::resource('products', 'Backend\ProductsController', ['except'=>'show']);
    Route::resource('users', 'Backend\UsersController');
    Route::resource('ratings', 'Backend\RatingsController', ['only' => ['index','destroy']]);
    Route::resource('orders', 'Backend\OrdersController');
    Route::resource('accounts', 'Backend\AccountsController');
    Route::resource('contacts', 'Backend\ContactsController');
    Route::resource('permissions', 'Backend\PermissionsController');
    Route::resource('groups', 'Backend\GroupsController');
});
