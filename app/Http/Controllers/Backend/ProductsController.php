<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests\Backend\ProductsRequest;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;
use App\Models\Backend\OrderDetails;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('brands')->paginate(10);
        return view('backend.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::orderBy('brand_name')->get();
        return view('backend.products.create', compact('brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductsRequest $request)
    {
        $data = $request->all();
        $productObj = new Product;
        
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $data['image'] = $productObj->upload($image);

                Product::create($data);
                $request->session()->flash('message', 'Product was created successfully!');

                return redirect('admin/products');
            }
        }

        return redirect('admin/products/create');
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
        $product = Product::findOrFail($id);
        $brands = Brand::all();

        return view('backend.products.edit', compact('product', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     * @param int                      $id      id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProductsRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();
        $productObj = new Product;
        
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $image = $request->file('image');
                $data['image'] = $productObj->upload($image);
                
                $product->update($data);
                $request->session()->flash('message', 'Product was updated successfully!');

                return redirect('admin/products');
            }
        }

        return redirect('admin/products/'.$id.'/edit');
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
        $product = OrderDetails::where('product_id', $id)->first();
        
        if ($product === null) {
            $product = Product::findOrFail($id);
            $product->delete();

            session()->flash('message', 'Product was deleted successfully!');
        } else {
            session()->flash('message', 'You can\'t deleted this product!');
        }

        return redirect('admin/products');
    }
}
