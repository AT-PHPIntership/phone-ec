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
        //$orderId = $request->searchorders;
        //$email = $request->email;
        //$user = User::where('email', $email)->first();
        //$orderItem = Order::where('id', $orderId)->where('user_id', $user->id)->first();

        $data = DB::table('orders')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('orders', 'orders.id', '=', 'orders.id')
            ->select('orders.id as id', 'posts.name as post_name', 'users.name as user_name', 'image', 'categories.name as cate_name', 'posts.created_at as day_created', 'views')
            ->paginate(5);

        return view('backend.pages.post.list', compact('data'));
        
        //return view('frontend.orders.index', compact('orderItem'));
    }
}
