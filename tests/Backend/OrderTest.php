	<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
             ->type($order->status . 'Update', 'status')
             ->press('Update')
             ->seePageIs('/admin/orders')
             ->see('Order was updated Successfully')
    }
}