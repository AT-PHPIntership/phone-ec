<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Category;

class CategoryTest extends TestCase {

    public function testAddNewCategory() {
        $admin = factory(Admin::class)->create();
        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('create')
                ->seePageIs('admin/categories/create')
                ->select(0, 'parent_id')
                ->type('Category ' . rand(), 'cate_name')
                ->type('Category ' . rand(), 'cate_description')
                ->check('cate_status')
                ->press('Create')
                ->seePageIs('admin/categories')
                ->see('Category was add successfully!');
    }
    public function testAddCategoryRequest() {
        $admin = factory(Admin::class)->create();
        $cate = Category::first();
        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('create')
                ->seePageIs('admin/categories/create')
                ->select(0, 'parent_id')
                ->type($cate->cate_name, 'cate_name')
                ->type('Category ' . rand(), 'cate_description')
                ->check('cate_status')
                ->press('Create')
                ->see('The Category Name  has already been taken');
        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('create')
                ->seePageIs('admin/categories/create')
                ->select(0, 'parent_id')
                ->type("", 'cate_name')
                ->type('Category ' . rand(), 'cate_description')
                ->check('cate_status')
                ->press('Create')
                ->see('Please enter Category Name');
    }

    public function testEditCategory() {
        $admin = factory(Admin::class)->create();
        $cate = Category::first();
        $catelast = Category::all()->last();
        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('update')
                ->seePageIs('admin/categories/'.$cate->id.'/edit')
                ->select(0, 'parent_id')
                ->type('Category'.rand(), 'cate_name')
                ->check('cate_status')
                ->press('Update')
                ->see('Category was update successfully!');
        
        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('update')
                ->seePageIs('admin/categories/'.$cate->id.'/edit')
                ->select(0, 'parent_id')
                ->type($catelast->cate_name, 'cate_name')
                ->check('cate_status')
                ->press('Update')
                ->see('The Category Name  has already been taken');

        $this->actingAs($admin, 'admin')
                ->visit('admin/categories')
                ->click('update')
                ->seePageIs('admin/categories/' . $cate->id . '/edit')
                ->select(0, 'parent_id')
                ->type('', 'cate_name')
                ->check('cate_status')
                ->press('Update')
                ->see('Please enter Category Name');
    }

    public function testDeleteCategory() {
        $admin = factory(Admin::class)->create();
        $cate = Category::all()->last();
        $cate_child = Category::where('parent_id', $cate->id)->first();
        
        if($cate_child)
        {
            $this->actingAs($admin, 'admin')
                    ->visit('admin/categories')
                    ->click('del')
                    ->see('Are you sure delete this category?')
                    ->press("Delete")
                    ->seeInDatabase('product_category', ['cate_name' => $cate->cate_name])
                    ->see('You can not delete this category!');
        }
        else {
            $this->actingAs($admin, 'admin')
                    ->visit('admin/categories')
                    ->click('del')
                    ->see('Are you sure delete this category?')
                    ->press("Delete") 
                    ->notSeeInDatabase('product_category', ['cate_name' => $cate->cate_name])
                    ->see('Category was delete successfully!');
        }      
    }
}