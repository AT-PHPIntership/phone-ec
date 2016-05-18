<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;

class BrandTest extends TestCase
{
    public function testAddNewBrand()
    {
        $admin = factory(Admin::class)->create();
        
    	$this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('create')
             ->seePageIs('admin/brands/create')
             ->type('Brand '.rand(), 'brand_name')
             ->press('Create')
             ->seePageIs('/admin/brands')
             ->see('Brand was created successfully!');
    }

    /**
    * @depends testAddNewBrand
    */
    public function testAddBrandRequest()
    {
        $admin = factory(Admin::class)->create();
        $brand = Brand::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('create')
             ->seePageIs('admin/brands/create')
             ->type($brand->brand_name, 'brand_name')
             ->press('Create')
             ->see('The brand name has already been taken');

        $this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('create')
             ->seePageIs('admin/brands/create')
             ->type('', 'brand_name')
             ->press('Create')
             ->see('The brand name field is required');
    }

    /**
    * @depends testAddNewBrand
    */
    public function testUpdateBrand()
    {
        $admin = factory(Admin::class)->create();
        $brand = Brand::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('update')
             ->type($brand->brand_name . 'Updated', 'brand_name')
             ->press('Update')
             ->seePageIs('/admin/brands')
             ->see('Brand was updated successfully!');
    }

    /**
    * @depends testUpdateBrand
    */
    public function testUpdateBrandRequest()
    {
        $admin = factory(Admin::class)->create();
        $brand = Brand::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('update')
             ->type($brand->brand_name, 'brand_name')
             ->press('Update')
             ->see('The brand name has already been taken');

        $this->actingAs($admin, 'admin')
             ->visit('admin/brands')
             ->click('update')
             ->type('', 'brand_name')
             ->press('Update')
             ->see('The brand name field is required');
    }

    public function testDeleteBrand()
    {
        $admin = factory(Admin::class)->create();
        $brand = Brand::all();
        $isBrandId = Product::where('brand_id',$brand->last()->id)->first();

        if (count($brand) > 10) {
            $link = 'admin/brands?page='.count($brand)/10;
        } else {
            $link = 'admin/brands';
        }

        if ($isBrandId === null)
        {
            $this->actingAs($admin, 'admin')
                 ->visit($link)
                 ->click('del')
                 ->see('Are you sure delete this brand?')
                 ->press('Delete')
                 ->see('Brand was deleted successfully!');
        }
        else
        {
            $this->actingAs($admin, 'admin')
                 ->visit($link)
                 ->click('del')
                 ->see('Are you sure delete this brand?')
                 ->press('Delete')
                 ->see('You can\'t deleted this brand!');
        }
    }
}
