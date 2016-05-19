<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SearchRequest;
use Illuminate\Support\Facades\Input;
use DB;
class SearchController extends Controller
{
    /**
    * Display search products
    *
    * @return array
    */
    public function index(SearchRequest $request)
    {
        $search = Input::get('search');

        $products = DB::table('products');

        $results = $products->join('brands', 'products.brand_id', '=', 'brands.id')
                            ->where('products.name', 'LIKE', '%'. $search .'%')
                            ->orWhere('products.description', 'LIKE', '%'. $search .'%')
                            ->orWhere('brands.brand_name', 'LIKE', '%'. $search .'%')
                            ->paginate(10);

        return view('frontend.dashboard.search', compact('results', 'search'));
     
    }
}

