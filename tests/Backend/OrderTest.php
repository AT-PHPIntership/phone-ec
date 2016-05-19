	<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Models\Backend\Admin;
use App\Models\Backend\Order;

class OrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateOrder()
    {
        $admin = factory(Admin::class)->create();
        $order = Order::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/orders')
             ->click('update')
             ->select($order->status . '3', 'Update', 'status')
             ->press('Update')
             ->seePageIs('/admin/orders')
             ->see('Order was updated successfully!');
    }
    /**
    * @depends testUpdateOrder
    */
    public function testUpdateOrderRequest()
    {
        $admin = factory(Admin::class)->create();
        $order = Order::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/orders')
             ->click('update')
             ->select($order->status . '3', 'Update', 'status')
             ->press('Update')
             ->seePageIs('/admin/orders');
             
    }
}