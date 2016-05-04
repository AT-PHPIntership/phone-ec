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
        $details = Order::with('users')->paginate(10);

        return view('backend.details.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.details.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DetailsRequest $request)
    {
        $data = $request->all();
        Detail::create($data);

        $request->session()->flash('message', 'Detail was created successfully!');
        return redirect('admin/details');
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
        $detail = Detail::findOrFail($id);
        return view('backend.details.edit', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DetailsRequest $request, $id)
    {
        $detail = Detail::findOrFail($id);
        $data = $request->all();
        $detail->update($data);
        $request->session()->flash('message', 'Detail was updated successfully!');
        
        return redirect('admin/details');
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
        $detail = Detail::findOrFail($id);
        $detail->delete();

        return back();
    }
}
