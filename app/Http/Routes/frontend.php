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

/*=================================================================================*/
view()->composer(['frontend.layouts.sidebar','frontend.layouts.nav'], function ($view) {
    $productLatest = App\Models\Frontend\Product::with('brands')->take(5)
                                                                ->orderBy('created_at')
                                                                ->get();
    $productCategory = App\Models\Frontend\Brand::all();

    $view->with(['productLatest'=> $productLatest,
                 'productCategory' => $productCategory]);
});

//Home page
Route::get('/', 'Frontend\ProductsController@listAllProducts');

//Subscribe function
Route::post('sub', 'Backend\SubscribeController@subscribe');

//Cart function
Route::get('cart', 'Frontend\CheckoutController@showCart');
Route::post('cart', 'Frontend\CheckoutController@cart');
Route::delete('cart/{id}', 'Frontend\CheckoutController@deleteCart');
Route::post('cart/update', 'Frontend\CheckoutController@updateCart');

//Checkout function
Route::get('checkout', 'Frontend\CheckoutController@showCheckout');
Route::post('checkout', 'Frontend\CheckoutController@checkout');
Route::get('checkout/success', 'Frontend\CheckoutController@success');

//Rating function
Route::post('products/rating', 'Frontend\ProductsController@rating');

// Authentication routes...
Route::get('login', 'Frontend\Auth\AuthController@getLogin');
Route::post('login', 'Frontend\Auth\AuthController@postLogin');
Route::get('logout', 'Frontend\Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Frontend\Auth\AuthController@getRegister');
Route::post('register', 'Frontend\Auth\AuthController@postRegister');

//Category page
Route::get('category', 'Frontend\CategoryController@category');
Route::get('category/{id}', 'Frontend\ProductsController@listProducts');

//Search function
Route::get('search', 'Frontend\SearchController@index');

//orders routes....
Route::get('orders-tracking', 'Frontend\OrdersController@showOrderTracking');
Route::post('/orders-tracking', 'Frontend\OrdersController@search');

//Forgot password routes...
Route::get('password/email', 'Frontend\Auth\PasswordController@getEmail');
Route::post('password/email', 'Frontend\Auth\PasswordController@postEmail');
Route::get('password/reset/{token?}', 'Frontend\Auth\PasswordController@getReset');
Route::post('password/reset', 'Frontend\Auth\PasswordController@postReset');

//Product detail
Route::get('{detailsUrl}', 'Frontend\ProductsController@details');
