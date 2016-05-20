<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Backend\Admin;
use App\Models\Backend\Order;

class OrdersTrackingTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSearch()
    {
    	$admin = factory(Admin::class)->create();
        $order = Order::first();

        $this->actingAs($admin, 'admin')
        	 ->visit('orders-tracking')
        	 ->see('Orders')
        	 ->type('2', 'searchorders')
        	 ->type('lorna.kutch@hotmail.com', 'email')
        	 ->press('Search')
        	 ->seePageIs('orders-tracking')
        	 ->see('Your order status:');

    }
    /**
    * @Depends testSearch
    */
    public function testSearchRequest()
    {
    	$admin = factory(Admin::class)->create();
        $order = Order::first();

        $this->actingAs($admin, 'admin')
        	 ->visit('orders-tracking')
        	 ->type('2', 'searchorders')
        	 ->type('lorna.kutch@hotmail.com', 'email')
        	 ->press('Search')
        	 ->seePageIs('orders-tracking');

    }
}
