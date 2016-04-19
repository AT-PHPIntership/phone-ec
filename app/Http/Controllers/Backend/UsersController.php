<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    //
    public function index() {
    	$users = user::get();
    	return view('backend.users.index', ['users' =>  $users]);
    }	
}
