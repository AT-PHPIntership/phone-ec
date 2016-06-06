<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Permission;

class PermissionTest extends TestCase
{
    public function testShowIndexPermission()
    {
        $admin = factory(Admin::class)->create();

        $this->actingAs($admin, 'admin')
        	 ->visit('admin/permissions')
        	 ->see('Permissions Manager');
    }

    public function testShowCreatePermission()
    {
        $admin = factory(Admin::class)->create();

        $this->actingAs($admin, 'admin')
        	 ->visit('admin/permissions')
        	 ->click('create')
        	 ->seePageIs('admin/permissions/create')
        	 ->see('Add new permission');
    }

    public function testShowEditPermission()
    {
        $admin = factory(Admin::class)->create();
        $role = Permission::first();

        $this->actingAs($admin, 'admin')
        	 ->visit('admin/permissions')
        	 ->click('edit')
        	 ->seePageIs('admin/permissions/'. $role->id .'/edit')
        	 ->see('Edit permission');
    }

    public function testShowErrorWhenAddPermissionExists()
    {
    	$admin = factory(Admin::class)->create();

    	$role  = Permission::first();
    	$has_role = \Config::get('app.has_permission');

    	if ($role->see == $has_role && $role->inset == $has_role && $role->edit == $has_role && $role->destroy == $has_role) {
			$this->actingAs($admin, 'admin')
	    	 	 ->visit('admin/permissions')
	    		 ->click('create')
	    		 ->seePageIs('admin/permissions/create')
	    		 ->select($role->module, 'module')
				 ->check('see')
				 ->check('create')
				 ->check('update')
				 ->check('delete')
				 ->press('Create')
				 ->seePageIs('admin/permissions')
	    		 ->see('Permission was exists, please try againt!');
    	}
    }

    public function testShowErrorWhenEditPermissionExists()
    {
    	$admin = factory(Admin::class)->create();

    	$role  = Permission::first();
    	$has_role = \Config::get('app.has_permission');

    	if ($role->see == $has_role && $role->inset == $has_role && $role->edit == $has_role && $role->destroy == $has_role) {
	    	$this->actingAs($admin, 'admin')
	        	 ->visit('admin/permissions')
	        	 ->click('edit')
	    		 ->seePageIs('admin/permissions/'. $role->id .'/edit')
	    		 ->select($role->module, 'module')
				 ->check('see')
				 ->check('create')
				 ->check('update')
				 ->check('delete')
				 ->press('edit')
				 ->seePageIs('admin/permissions')
	    		 ->see('Permission was exists, please try againt!');
    	}
    }

    public function testCancelEdit()
    {
    	$admin = factory(Admin::class)->create();

    	$this->actingAs($admin, 'admin')
        	 ->visit('admin/permissions')
        	 ->click('edit')
    		 ->see('Edit permission')
			 ->click('cancel')
			 ->seePageIs('admin/permissions')
			 ->see('Permissions Manager');
    }

    public function testEditPermission()
    {
    	$admin = factory(Admin::class)->create();

    	$role  = Permission::first();
    	$has_role = \Config::get('app.has_permission');

    	if ($role->see == $has_role && $role->inset == $has_role && $role->edit == $has_role && $role->destroy == $has_role) {
	    	$this->actingAs($admin, 'admin')
	        	 ->visit('admin/permissions')
	        	 ->click('edit')
	    		 ->seePageIs('admin/permissions/'. $role->id .'/edit')
	    		 ->select($role->module, 'module')
				 ->unCheck('see')
				 ->check('create')
				 ->check('update')
				 ->check('delete')
				 ->press('edit')
				 ->seePageIs('admin/permissions')
	    		 ->see('Permission was edit successfully!');
    	}
    }

    public function testDeletePermission()
    {
    	$admin = factory(Admin::class)->create();
    	$permission = Permission::first();
    	$this->actingAs($admin, 'admin')
	         ->visit('admin/permissions')
    		 ->click('delete')
    		 ->see('Are you sure delete this permission?')
			 ->press('Delete')
    		 ->see('Permission was delete successfully!');
    }

    public function testCancelDeletePermission()
    {
    	$admin = factory(Admin::class)->create();
    	$permission = Permission::first();
    	$this->actingAs($admin, 'admin')
	         ->visit('admin/permissions')
    		 ->click('delete')
    		 ->see('Are you sure delete this permission?')
			 ->press('Cancel')
    		 ->seeInDatabase('permissions', ['module' => $permission->module, 'see' => $permission->see, 'inset' => $permission->inset, 'edit' => $permission->edit, 'destroy' => $permission->destroy]);
    }

    public function testAddPermission()
    {
    	$admin = factory(Admin::class)->create();
    	$this->actingAs($admin, 'admin')
	         ->visit('admin/permissions')
    		 ->click('create')
    		 ->seePageIs('admin/permissions/create')
    		 ->select('Brands','module')
    		 ->check('create')
    		 ->check('update')
    		 ->press('Create')
    		 ->seeInDatabase('permissions', ['module' => 'Brands', 'see' => 0, 'inset' => 1, 'edit' => 1, 'destroy' => 0])
    		 ->seePageIs('admin/permissions')
    		 ->see('Permission was created successfully!');
    }
}
