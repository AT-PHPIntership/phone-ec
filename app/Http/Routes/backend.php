<?php
Route::group(['middleware' => ['admin']], function () {
    Route::get('route', function () {
        return view('backend.dashboard.index');
    });
    Route::resource('admin/users', 'Backend\UsersController');
});
