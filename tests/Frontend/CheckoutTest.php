<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\User;
use App\Models\Frontend\Product;

class CheckoutTest extends TestCase
{
    public function testLoginBeforeCheckout()
    {
        $this->visit('checkout')
        	 ->seePageIs('login');
    }

    public function testProductMustBeInCartBeforeCheckout()
    {
    	$user = factory(User::class)->create();

    	$this->actingAs($user)
    		 ->visit('checkout')
    		 ->seePageIs('cart')
    		 ->see('There are no products in your cart');
    }

    public function testCheckout()
    {
    	$user = factory(User::class)->create();
    	$product = Product::first();
    	$link = str_slug($product->name).'-'.$product->id;

    	$this->actingAs($user)
    		 ->visit($link)
    		 ->see($product->name)
    		 ->press('Add to Cart')
    		 ->seePageIs('cart')
    		 ->see($product->name)
    		 ->click('Checkout')
    		 ->visit('checkout')
    		 ->see('Step 1: Shipping Details')
    		 ->see('Step 2: Payment Method')
    		 ->see('Step 3: Confirm Order')
    		 ->press('Confirm Order')
    		 ->seePageIs('checkout/success')
    		 ->see('Your orders are booked');
    }

    public function testCheckoutRequest()
    {
    	$user = factory(User::class)->create();
    	$product = Product::first();
    	$link = str_slug($product->name).'-'.$product->id;

    	//The attributes field is required
    	$this->actingAs($user)
    		 ->visit($link)
    		 ->see($product->name)
    		 ->press('Add to Cart')
    		 ->seePageIs('cart')
    		 ->see($product->name)
    		 ->click('Checkout')
    		 ->visit('checkout')
    		 ->type('', 'user_name')
    		 ->type('', 'user_address')
    		 ->type('', 'user_phone')
    		 ->press('Confirm Order')
    		 ->see('field is required');

		//The attributes may not be greater than 255 characters
    	$this->actingAs($user)
    		 ->visit($link)
    		 ->see($product->name)
    		 ->press('Add to Cart')
    		 ->seePageIs('cart')
    		 ->see($product->name)
    		 ->click('Checkout')
    		 ->visit('checkout')
    		 ->type('Hoang Nguyen', 'user_name')
    		 ->type(str_random(266), 'user_address')
    		 ->type(str_random(266), 'user_phone')
    		 ->press('Confirm Order')
    		 ->see('may not be greater than 255 characters');
    }
}
