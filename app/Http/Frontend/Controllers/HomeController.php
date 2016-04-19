<?php

namespace App\Http\Frontend\Controllers;

use Illuminate\Http\Request;

use App\Http\Frontend\Requests;

class HomeController extends Controller
{
    /**
     * Display a listing of the new products.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.dashboard.index');
    }
}
