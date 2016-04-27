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
    public function listAllProducts()
    {
        $productLatest = Product::with('brands')->take(5)
                                                ->orderBy('created_at')
                                                ->get();

        // $listFeaturedProducts = Rating::with('products')->take(10)->orderBy('created_at')->get();
        $listLatestProducts = Product::orderBy('id', 'DESC')->get();
        // $listBestsellerProducts = Order::with('products')->take(10)->orderBy('created_at')->get();
        return view('frontend.dashboard.index', compact('listLatestProducts', 'productLatest'));
    }
}
