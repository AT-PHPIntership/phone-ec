<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;

class SearchFunctionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearchFunction() {
    	$product = Product::first();
    	$brand = Brand::first();

        $this->visit('/')
        ->see('Search')
        
        //Search by product's name
        ->type($product->name, 'search')
        ->press('search')
        ->see('Search Results for '.$product->name)
        ->see($product->name)
        ->see($product->current_price)

        //Search by product's category
        ->type($brand->brand_name, 'search')
        ->press('search')
        ->see('Search Results for '.$brand->brand_name)

        //Search no results
        ->type('testsearch', 'search')
        ->press('search')
        ->see('Sorry, no results were found')

        //Search field is required
        ->type('', 'search')
        ->press('search')
        ->see('The search field is required');

    }
}
