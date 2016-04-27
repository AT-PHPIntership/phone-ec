<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;

class ProductsController extends Controller
{

    /**
    * Display details of product
    *
    * @param string $detailsUrl path of details page
    *
    * @return array
    */
    public function details($detailsUrl)
    {
        $array = explode('-', $detailsUrl);
        $id = last($array);
        $product = Product::with('brands')->findOrFail($id);
        $productLatest = Product::with('brands')->take(5)
                                                ->orderBy('created_at')
                                                ->get();

        return view('frontend.dashboard.detailProduct', compact('product', 'productLatest'));
    }

    /**
     * Show list products by category
     *
     * @param int $id id category
     *
     * @return \Illuminate\Http\Response
     */
    public function listProducts($id)
    {
        $listProducts = Product::where('brand_id', $id)->paginate(10);
        return view('frontend.dashboard.productCategory', compact('listProducts'));
    }
}
