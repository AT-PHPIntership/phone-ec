<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use DB;

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
    * Display list products
    *
    * @return array
    */
    public function listAllProducts()
    {
        $productLatest = Product::with('brands')->take(5)
                                                ->orderBy('created_at')
                                                ->get();

        $listFeaturedProducts = DB::table('rating') ->join('products', 'rating.product_id', '=', 'products.id')
                                                    ->select('products.*', DB::raw('SUM(rating.score) as rating'))
                                                    ->groupBy('rating.product_id')
                                                    ->orderBy('rating', 'desc')
                                                    ->get();
        $listLatestProducts = Product::orderBy('id', 'DESC')->get();
        // $listBestsellerProducts = Order::with('products')->take(10)->orderBy('created_at')->get();
        return view('frontend.dashboard.index', compact('listLatestProducts', 'productLatest', 'listFeaturedProducts'));
    }
}
