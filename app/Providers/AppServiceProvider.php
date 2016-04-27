<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Frontend\Product;

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
        view()->share('productLatest', $productLatest);
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
