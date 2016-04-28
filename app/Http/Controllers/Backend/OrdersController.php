<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\Backend\ProductsRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\Order;
use App\Models\Backend\User;
use App\Http\Requests\Backend\OrdersRequest;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('users')->paginate(10);

        return view('backend.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::orderBy('user_name')->get();
        
        return view('backend.orders.create', compact('orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(OrdersRequest $request)
    {
        $data = $request->all();
        Order::create($data);

        $request->session()->flash('message', 'Order was created successfully!');
        return redirect('admin/orders');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();

        return view('backend.orders.edit', compact('order', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(OrdersRequest $request, $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->all();
        $order->update($data);
        $request->session()->flash('message', 'Order was updated successfully!');
        
        return redirect('admin/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return back();
    }
}
