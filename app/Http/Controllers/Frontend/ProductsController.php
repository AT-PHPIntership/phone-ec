<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Product;
use App\Models\Frontend\Rating;
use App\Http\Requests\Frontend\RatingsRequest;
use Carbon\Carbon;
use Auth;

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
        $countRatings = Rating::where('product_id', $id)->count();
        $scoreAverage = Rating::where('product_id', $id)->avg('score');
        $ratings = Rating::with('users')->where('product_id', $id)
                                        ->paginate(10);

        return view(
            'frontend.dashboard.detailProduct',
            compact(
                'product',
                'productLatest',
                'ratings',
                'countRatings',
                'scoreAverage'
            )
        );
    }

    /**
    * Display details of product
    *
    * @param request $request request
    *
    * @return array
    */
    public function rating(RatingsRequest $request)
    {
        if (Auth::check()) {
            $detailsUrl = $request->product_id;
            $array = explode('-', $detailsUrl);
            $productId = last($array);

            $data = $request->all();
            $data['user_id'] = $request->user()->id;
            $data['product_id'] = $productId;

            Rating::create($data);
            $request->session()->flash('rating', 'Thank you for your rating!');

            return redirect($detailsUrl);
        }
    }
}
