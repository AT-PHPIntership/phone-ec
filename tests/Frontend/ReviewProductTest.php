<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Frontend\Product;
use App\Models\Backend\User;
use App\Models\Backend\Rating;

class ReviewProductTest extends TestCase
{
    public function testLoginBeforeReview()
    {
    	$product = Product::first();
    	$user = User::first();
    	$link = str_slug($product->name).'-'.$product->id;

    	$this->visit($link)
    		 ->see($product->name)
    		 ->click('Review')
    		 ->click('Click here to login')
    		 ->seePageIs('login');
    }

	public function testReview()
	{
		$user = factory(User::class)->create();
    	$product = Product::first();
    	$link = str_slug($product->name).'-'.$product->id;

		$this->actingAs($user)
			 ->visit($link)
    		 ->see($product->name)
    		 ->click('Review')
    		 ->type('Greate', 'comment')
    		 ->select('3', 'score')
    		 ->press('Continue')
    		 ->see('Thank you for your rating!');
	}

	public function testIsReview()
	{
		$user = factory(User::class)->create();
    	$product = Product::first();
    	$link = str_slug($product->name).'-'.$product->id;

		$rating = factory(Rating::class)->create([
			'product_id' => $product->id,
			'user_id' => $user->id,
			'score' => rand(1,5),
			'comment' => 'Greate!',
		]);

		$this->actingAs($user)
			 ->visit($link)
    		 ->see($product->name)
    		 ->click('Review')
    		 ->see('You have rated this product. Please help us rating the other products!');
	}

	public function testReviewRequest()
	{
		$user = factory(User::class)->create();
    	$product = Product::first();
    	$link = str_slug($product->name).'-'.$product->id;

    	//The attributes is required
    	$this->actingAs($user)
			 ->visit($link)
    		 ->see($product->name)
    		 ->click('Review')
    		 ->type('', 'comment')
    		 ->press('Continue')
    		 ->see('field is required');

		//The attributes must be at least 5 characters
    	$this->actingAs($user)
			 ->visit($link)
    		 ->see($product->name)
    		 ->click('Review')
    		 ->type('Bad', 'comment')
    		 ->press('Continue')
    		 ->see('must be at least 5 characters');
	}
}
