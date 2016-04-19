<?php

namespace App\Http\Frontend\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * View share menu in navbar
     *
     * @return object of categoy
     */
    public function __construct()
    {
        // $menus = Category::getMenu();
        // View::share('menus', $menus);
    }
}

