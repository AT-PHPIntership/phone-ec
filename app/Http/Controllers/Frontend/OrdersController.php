<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\User;
use App\Models\Frontend\OrderDetails;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOrderTracking()
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
        $orderId = $request->searchorders;
        $email = $request->email;
        $user = User::where('email', $email)->first();
        $orderItem = Order::where('id', $orderId)->where('user_id', $user->id)->first();
        
        return view('frontend.orders.index', compact('orderItem'));
    }
}
