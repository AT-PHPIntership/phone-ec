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
Route::group(['middleware' => ['web','auth:web']], function () {
    Route::get('/home', 'HomeController@index');
});

// front end
Route::group(['middleware' => ['web']], function () {
    // Authentication routes...
    Route::get('/', 'HomeController@index');

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
// back end
    Route::get('admin1/', function () {
        return view('backend.dashboard.index');
    });

    Route::get('admin1/login', function () {
        return view('backend.auth.login');
    });

    Route::get('admin1/products', function () {
        return view('backend.products.index');
    });

    Route::get('admin1/create', function () {
        return view('backend.products.create');
    });

    Route::get('admin1/edit', function () {
        return view('backend.products.edit');
    });

});