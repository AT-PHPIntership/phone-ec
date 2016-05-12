<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    /**
    * Display search products
    *
    * @return array
    */
    public function index()
    {
        $search = \Request::get('search');

        $products = DB::table('products');

        $results = $products->join('brands', 'products.brand_id', '=', 'brands.id')
                            ->where('products.name', 'LIKE', '%'. $search .'%')
                            ->orWhere('products.description', 'LIKE', '%'. $search .'%')
                            ->orWhere('brands.brand_name', 'LIKE', '%'. $search .'%')
                            ->paginate(10);

        return view('frontend.dashboard.search', compact('results','search'));
     
    }
}
