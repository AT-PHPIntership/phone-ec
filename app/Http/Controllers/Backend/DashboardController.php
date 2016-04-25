<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Index admmin
     *
     * @return view index of admin
     */
    public function index()
    {
        return view('backend.dashboard.index');
    }
}
