<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Product;
use App\Models\Backend\Brand;

class CartTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddCart()
    {
    	$category = Brand::first();
    	$product = Product::where('brand_id', $category->id)->first();
    	// dd($product);
    	//Add product to cart
        $this->visit('/category/1')
        ->see('0 item')
        ->press('Add to Cart')
        ->seePageIs('/cart')
        ->see('Shopping Cart')
        ->see('1 item')
        ->see($product->name)

        //Add lot of products
        ->visit('/')
        ->press('Add to Cart')
        ->seePageIs('/cart')
        ->see('2 item');
    }

    public function testUpdateCart() {
    	$category = Brand::first();
    	$product = Product::where('brand_id', $category->id)->first();

        //Update cart
         $this->visit('/category/1')
        ->see('0 item')
        ->press('Add to Cart')
        ->seePageIs('/cart')
        ->see('Shopping Cart')
        ->see('1 item')
        ->see(number_format($product->current_price))
        ->type('3', 'quantity')
        ->click('btnUpdate')
        ->seePageIs('/cart')
        //Check price total
        ->see(number_format($product->current_price)*3);
    }

    public function testCleanCart() {
    	$category = Brand::first();
    	$product = Product::where('brand_id', $category->id)->first();

        //Update cart
         $this->visit('/category/1')
        ->see('0 item')
        ->press('Add to Cart')
        ->seePageIs('/cart')
        ->see('Shopping Cart')
        ->see('1 item')
        ->press('Delete')
        ->see('There are no products in your cart.')
        ->see('0 item');
    }
}
