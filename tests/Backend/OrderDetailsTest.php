<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Backend\Admin;
use App\Models\Backend\Order;

class OrderDetailsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDetails()
    {
        $admin = factory(Admin::class)->Create();
        $Order = Order::first();

         $this->actingAs($admin, 'admin')
         	  ->visit('admin/orders')
         	  ->see('ID')
         	  ->click('2')
         	  ->seePageIs('admin/orders/2')
         	  ->see('Orders Manage')
         	  ->see('ID')
         	  ->see('Name')
         	  ->see('Image')
         	  ->see('Quantity')
         	  ->see('Price')
         	  ->see('Total Price');
    }
    /**
    * @Depends testDetails
    */
    public function testDetailsRequest()
    {
    	$admin = factory(Admin::class)->Create();
    	$Order = Order::first();

    	 $this->actingAs($admin, 'admin')
    	 	  ->visit('admin/orders')
    	 	  ->click('2')
    	 	  ->seePageIs('admin/orders/2');
    }
}
