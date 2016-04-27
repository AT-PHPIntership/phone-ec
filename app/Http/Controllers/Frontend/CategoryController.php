<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Brand;

class CategoryController extends Controller
{
    public function category()
    {
        return view('frontend.dashboard.productCategory');
    }
}
