<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Permission;

class PermissionTest extends TestCase
{
	public function getAdmin()
	{
		return Admin::first();
	}

    public function testShowListPermission()
    {
        $this->visit('admin/login')
        	 ->type($this->getAdmin()->email, 'email')
        	 ->type('admin1', 'password')
        	 ->press('Login')
        	 ->seePageIs('admin/dashboard')
        	 ->click('Permissions')
        	 ->seePageIs('admin/permissions')
        	 ->see('Permissions Manager');
    }

    public function testErrorAddPermissionExists()
    {
    	$permission = Permission::first();

    	$show    = $permission->see;
    	$add     = $permission->addNew;
    	$edit    = $permission->edit;
    	$destroy = $permission->destroy;

    	if ($show == 1 && $add == 1 && $edit == 1 && $destroy == 1) {
    		$this->visit('admin/login')
        		 ->type($this->getAdmin()->email, 'email')
        		 ->type('admin1', 'password')
        		 ->press('Login')
        		 ->seePageIs('admin/dashboard')
        		 ->click('Permissions')
        		 ->seePageIs('admin/permissions')
        		 ->click('Add new permission')
        		 ->seePageIs('admin/permissions/create')
        		 ->select($permission->module, 'module')
    			 ->check('see')
    			 ->check('create')
    			 ->check('update')
    			 ->check('delete')
    			 ->press('Create')
    			 ->seePageIs('admin/permissions')
        		 ->see('Permission was exists, please try againt!');
    	}
    }

    public function testEditPermissionExists()
    {
    	$permission = Permission::first();

    	$show    = $permission->see;
    	$add     = $permission->addNew;
    	$edit    = $permission->edit;
    	$destroy = $permission->destroy;
    	
    	if ($show == 1 && $add == 1 && $edit == 1 && $destroy == 1) {
	    	$this->visit('admin/login')
	    		 ->type($this->getAdmin()->email, 'email')
	    		 ->type('admin1', 'password')
	    		 ->press('Login')
	    		 ->seePageIs('admin/dashboard')
	    		 ->click('Permissions')
	    		 ->seePageIs('admin/permissions')
	    		 ->click('edit')
	    		 ->seePageIs('admin/permissions/'. $permission->id .'/edit')
	    		 ->select($permission->module, 'module')
				 ->check('see')
				 ->check('create')
				 ->check('update')
				 ->check('delete')
				 ->press('Edit')
				 ->seePageIs('admin/permissions')
	    		 ->see('Permission was exists, please try againt!');
    	}
    }

    public function testCancelEdit()
    {
    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('Permissions')
    		 ->seePageIs('admin/permissions')
    		 ->click('edit')
    		 ->see('Edit permission')
			 ->click('cancel')
			 ->seePageIs('admin/permissions')
			 ->see('Permissions Manager');
    }

    public function testEditPermission()
    {
    	$permission = Permission::first();

    	$show    = $permission->see;
    	$add     = $permission->addNew;
    	$edit    = $permission->edit;
    	$destroy = $permission->destroy;
    	
    	if ($show == 1 && $add == 1 && $edit == 1 && $destroy == 1) {
	    	$this->visit('admin/login')
	    		 ->type($this->getAdmin()->email, 'email')
	    		 ->type('admin1', 'password')
	    		 ->press('Login')
	    		 ->seePageIs('admin/dashboard')
	    		 ->click('Permissions')
	    		 ->seePageIs('admin/permissions')
	    		 ->click('edit')
	    		 ->seePageIs('admin/permissions/'. $permission->id .'/edit')
	    		 ->select($permission->module, 'module')
				 ->unCheck('see')
				 ->check('create')
				 ->check('update')
				 ->check('delete')
				 ->press('Edit')
				 ->seePageIs('admin/permissions')
	    		 ->see('Permission was edit successfully!');
    	}
    }

    public function testAddPermission()
    {
    	$this->visit('admin/login')
        	 ->type($this->getAdmin()->email, 'email')
        	 ->type('admin1', 'password')
        	 ->press('Login')
        	 ->seePageIs('admin/dashboard')
    		 ->click('Permissions')
    		 ->see('Permissions Manager')
    		 ->click('Add new permission')
    		 ->seePageIs('admin/permissions/create')
    		 ->select('Brands','module')
    		 ->check('create')
    		 ->check('update')
    		 ->press('Create')
    		 ->seeInDatabase('permissions', ['module' => 'Brands', 'see' => 0, 'addNew' => 1, 'edit' => 1, 'destroy' => 0])
    		 ->seePageIs('admin/permissions')
    		 ->see('Permission was created successfully!');
    }

    public function testDeletePermission()
    {
    	$permission = Permission::first();

    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('Permissions')
    		 ->seePageIs('admin/permissions')
    		 ->click('delete')
    		 ->see('Are you sure delete this permission?')
			 ->press('Delete')
    		 ->see('Permission was delete successfully!');
    }

    public function testCancelDeletePermission()
    {
    	$permission = Permission::first();

    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('Permissions')
    		 ->seePageIs('admin/permissions')
    		 ->click('delete')
    		 ->see('Are you sure delete this permission?')
			 ->press('Cancel')
    		 ->seeInDatabase('permissions', ['module' => $permission->module, 'see' => $permission->see, 'addNew' => $permission->addNew, 'edit' => $permission->edit, 'destroy' => $permission->destroy]);
    }
}
