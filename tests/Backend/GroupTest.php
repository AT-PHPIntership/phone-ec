<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Group;
use App\Models\Backend\GroupPermission;

class GroupTest extends TestCase
{
	//use DatabaseMigrations;

    public function getAdmin()
	{
		return Admin::first();
	}

    public function testShowListGroup()
    {
        $this->visit('admin/login')
        	 ->type($this->getAdmin()->email, 'email')
        	 ->type('admin1', 'password')
        	 ->press('Login')
        	 ->seePageIs('admin/dashboard')
        	 ->click('groups')
        	 ->seePageIs('admin/groups')
        	 ->see('Group Role Manager');
    }

    public function testErrorAddGroupExists()
    {
    	$group = Group::first();

		$this->visit('admin/login')
			 ->type($this->getAdmin()->email, 'email')
			 ->type('admin1', 'password')
			 ->press('Login')
			 ->seePageIs('admin/dashboard')
			 ->click('groups')
			 ->seePageIs('admin/groups')
			 ->click('Add new group role')
			 ->seePageIs('admin/groups/create')
			 ->type($group->name, 'name')
			 ->press('Create')
			 ->see('The name has already been taken.');
    }

    public function testEditGroupExists()
    {
    	$group = Group::all()->last();

    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->seePageIs('admin/groups')
    		 ->click('edit')
    		 ->see('Edit group role')
    		 ->type($group->name, 'name')
			 ->press('Edit')
    		 ->see('The name has already been taken.');
    }

    public function testCancelEdit()
    {
    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->seePageIs('admin/groups')
    		 ->click('edit')
    		 ->see('Edit group role')
			 ->click('cancel')
			 ->seePageIs('admin/groups')
			 ->see('Group Role Manager');
    }

    public function testEditGroup()
    {
    	$group = Group::first();
    	
    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->seePageIs('admin/groups')
    		 ->click('edit')
    		 ->seePageIs('admin/groups/'. $group->id .'/edit')
    		 ->see('Edit group role')
			 ->press('Edit')
			 ->seePageIs('admin/groups')
    		 ->see('Group was edit successfully!');
    }

    public function testAddGroup()
    {
    	$name = 'name-'. rand();
    	$this->visit('admin/login')
        	 ->type($this->getAdmin()->email, 'email')
        	 ->type('admin1', 'password')
        	 ->press('Login')
        	 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->see('Group Role Manager')
    		 ->click('Add new group role')
    		 ->seePageIs('admin/groups/create')
    		 ->type($name, 'name')
    		 ->select('1', 'Brands')
    		 ->press('Create')
    		 ->seeInDatabase('groups', ['name' => $name])
    		 ->seePageIs('admin/groups')
    		 ->see('Group role was created successfully!');
    }

    public function testDeleteGroup()
    {
    	$group = Group::first();

    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->seePageIs('admin/groups')
    		 ->click('delete')
    		 ->see('Are you sure delete this Group Role?')
			 ->press('Delete')
    		 ->see('Group was delete successfully!');
    }

    public function testCancelDeleteGroup()
    {
    	$group = Group::first();

    	$this->visit('admin/login')
    		 ->type($this->getAdmin()->email, 'email')
    		 ->type('admin1', 'password')
    		 ->press('Login')
    		 ->seePageIs('admin/dashboard')
    		 ->click('groups')
    		 ->seePageIs('admin/groups')
    		 ->click('delete')
    		 ->see('Are you sure delete this Group Role?')
			 ->press('Cancel')
    		 ->seeInDatabase('groups', ['name' => $group->name]);
    }
}
