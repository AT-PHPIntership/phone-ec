<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\BrandsRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('backend.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BrandsRequest $request)
    {
        $data = $request->all();
        Brand::create($data);
        $request->session()->flash('message', 'Brand was created successfully!');
        
        return redirect('admin/brands');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id request update
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('backend.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request update
     * @param int                      $id      id brand
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BrandsRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $data = $request->all();
        $brand->update($data);
        $request->session()->flash('message', 'Brand was updated successfully!');
        
        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id delete brand
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();

        return redirect('admin/brands');
    }
}
