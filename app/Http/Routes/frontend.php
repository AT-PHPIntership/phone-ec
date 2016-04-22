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
Route::group(['middleware' => ['web']], function () {

	// Route::get('/', function () {
 //    	return view('frontend.dashboard.index');
	// });

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

	Route::get('account', function() {
		return view('frontend.dashboard.account');
	});

	Route::get('login', function() {
		return view('frontend.auth.login');
	});

	Route::get('register', function() {
		return view('frontend.auth.register');
	});

});