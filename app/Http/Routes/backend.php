<?php

Route::get('route',function(){
	return view('backend.dashboard.index');
});
Route::get('users', 'Backend\UsersController@index');