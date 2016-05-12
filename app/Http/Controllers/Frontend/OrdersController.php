<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDetails;
use Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders = Order::where('user_id', Auth::user()->id)->paginate(10);

        return view('frontend.dashboard.orderHistory', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $orderId = $id;
        $details = OrderDetails::with('products')->where('order_id', $id)->get();

        return view('frontend.dashboard.orderDetails', compact('details', 'orderId'));
    }
}
