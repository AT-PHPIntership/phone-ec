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

Route::group(['middleware' => ['auth:admin'],'prefix'=>'admin'], function () {
    Route::get('dashboard', 'Backend\DashboardController@index');
    Route::resource('brands', 'Backend\BrandsController', ['except'=>['show']]);
    Route::resource('products', 'Backend\ProductsController', ['except'=>'show']);
    Route::resource('users', 'Backend\UsersController');
    Route::resource('rating', 'Backend\RatingController', ['only' => ['index','destroy']]);
    Route::resource('orders', 'Backend\OrdersController');
    Route::resource('account', 'Backend\AccountsController');
    Route::resource('contact', 'Backend\ContactController');

    
    Route::get('chat', function () {
        return view('backend.chatwork.index');
    });

    Route::resource('permissions', 'Backend\PermissionsController');


    Route::resource('permissions', 'Backend\PermissionsController');

});
