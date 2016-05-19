<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Product;
use App\Models\Backend\Admin;
use App\Models\Backend\Brand;
use App\Models\Backend\OrderDetails;

class ProductTest extends TestCase
{
    public function testAddProduct()
    {
		$admin = factory(Admin::class)->create();
		$brand = Brand::first();

    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->type('Sony'.rand(), 'name')
    		 ->select($brand->id, 'brand_id')
    		 ->attach(public_path().'/upload/akira.jpg', 'image')
    		 ->type('100000', 'old_price')
    		 ->type('900000', 'current_price')
    		 ->type('99', 'quantity')
    		 ->type('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','description')
    		 ->type('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','des_tech')
    		 ->press('Create')
    		 ->seePageIs('admin/products')
    		 ->see('Product was created successfully!');
    }

    public function testUpdateProduct()
    {
    	$admin = factory(Admin::class)->create();

    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('edit')
    		 ->type('Sony'.rand(), 'name')
    		 ->select('1', 'brand_id')
    		 ->attach(public_path().'/upload/akira.jpg', 'image')
    		 ->type('1000000', 'old_price')
    		 ->type('9000000', 'current_price')
    		 ->type('98', 'quantity')
    		 ->type('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','description')
    		 ->type('Lorem Ipsum is simply dummy text of the printing and typesetting industry.','des_tech')
    		 ->press('Update')
    		 ->seePageIs('admin/products')
    		 ->see('Product was updated successfully!');
    }

    public function testDeleteProduct()
    {
    	$admin = factory(Admin::class)->create();
        $product = Product::all();
        $isProductId = OrderDetails::where('product_id',$product->last()->id)->first();

        if (count($product) > 10) {
        	$link = 'admin/products?page='.count($product)/10;
        } else {
        	$link = 'admin/products';
        }

        if ($isProductId === null)
        {
            $this->actingAs($admin, 'admin')
                 ->visit($link)
                 ->click('del')
                 ->see('Are you sure delete this product?')
                 ->press('Delete')
                 ->see('Product was deleted successfully!');
        }
        else
        {
            $this->actingAs($admin, 'admin')
                 ->visit($link)
                 ->click('del')
                 ->see('Are you sure delete this product?')
                 ->press('Delete')
                 ->see('You can\'t deleted this product!');
        }
    }
    
    public function testProductRequest()
    {
    	$admin = factory(Admin::class)->create();

    	//The attributes field is required
    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->type('', 'name')
    		 ->select('', 'brand_id')
    		 ->attach('', 'image')
    		 ->type('', 'old_price')
    		 ->type('', 'current_price')
    		 ->type('', 'quantity')
    		 ->type('','description')
    		 ->type('','des_tech')
    		 ->press('Create')
    		 ->see('field is required');
    	
    	//The attributes must be an image
    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->attach(public_path().'/robots.txt', 'image')
    		 ->press('Create')
    		 ->see('The image must be an image');
    	
    	//The attributes must be a number
    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->type('a', 'old_price')
    		 ->type('98a', 'current_price')
    		 ->type('9 8', 'quantity')
    		 ->press('Create')
    		 ->see('must be a number');

    	//The attributes must be at least 50 characters
    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->type('a', 'description')
    		 ->press('Create')
    		 ->see('The description must be at least 50 characters');

    	//The attributes must be at least 20 characters
    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/products')
    		 ->click('create')
    		 ->type('a', 'des_tech')
    		 ->press('Create')
    		 ->see('The des tech must be at least 20 characters');
    }
}
