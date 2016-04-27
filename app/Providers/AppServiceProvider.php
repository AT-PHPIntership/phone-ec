<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Frontend\Product;
use App\Models\Frontend\Brand;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $productLatest = Product::with('brands')->take(5)
                                                ->orderBy('created_at')
                                                ->get();
        $productCategory = Brand::select('id', 'brand_name')->get();
        view()->share(['productLatest' => $productLatest,
                       'productCategory' => $productCategory]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
