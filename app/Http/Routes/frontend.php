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
 * Route for Frontend
 */
Route::group(['middleware' => ['auth']], function () {

    Route::get('category', function () {
        return view('frontend.dashboard.productCategory');
    });
    Route::get('detail', function () {
        return view('frontend.dashboard.productDetail');
    });
    Route::get('account', function () {
        return view('frontend.dashboard.account');
    });
    Route::get('oder-history', function () {
        return view('frontend.dashboard.orderHistory');
    });
    Route::get('login', function () {
        return view('frontend.auth.login');
    });
    Route::get('register', function () {
        return view('frontend.auth.register');
    });

});

Route::group(['middleware' => ['web']], function () {

    Route::post('products/rating', 'Frontend\ProductsController@rating');
    Route::get('/', 'Frontend\ProductsController@listAllProducts');

    // Authentication routes...
    Route::get('login', 'Frontend\Auth\AuthController@getLogin');
    Route::post('login', 'Frontend\Auth\AuthController@postLogin');
    Route::get('logout', 'Frontend\Auth\AuthController@getLogout');

    // Registration routes...
    Route::get('register', 'Frontend\Auth\AuthController@getRegister');
    Route::post('register', 'Frontend\Auth\AuthController@postRegister');

    Route::post('products/rating', 'Frontend\ProductsController@rating');
    Route::get('/', 'Frontend\ProductsController@listAllProducts');
    Route::get('category', 'Frontend\CategoryController@category');
    Route::get('category/{id}', 'Frontend\ProductsController@listProducts');
    Route::get('{detailsUrl}', 'Frontend\ProductsController@details');
});
