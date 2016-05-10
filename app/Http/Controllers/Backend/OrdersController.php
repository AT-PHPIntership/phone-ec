<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use App\Models\Backend\OrderDetails;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('backend.orders.index', compact('orders'));
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
        $details = OrderDetails::with('products')->where('order_id', $id)->get();
        return view('backend.orders.details', compact('details'));
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
        $orders = Order::findOrFail($id);
        return view('backend.orders.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $data = $request->all();
        
        if ($order->update($data)) {
            $request->session()->flash('message', 'Order was updated successfully!');
        }
        else {
            $request->session()->flash('message', 'Update failed!');
        }


        return redirect('admin/orders');
    }
}
