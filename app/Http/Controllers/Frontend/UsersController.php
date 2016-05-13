<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDetails;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUsersTracking()
    {
        return view('frontend.orders.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request request
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        
        $username = $request->searchemail;
        $userItem = User::findOrFail($username);

        return view('frontend.orders.index', compact('userItem'));
    }
}
