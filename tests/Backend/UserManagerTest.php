<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\User;
use App\Models\Backend\Order;
class TestUserManager extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAddNewUser() {
    	$admin = factory(Admin::class)->create();

        $this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('create')
		->seePageIs('admin/users/create')
		->type('nametest'.rand(), 'name')
		->type('emailtest'.rand().'@gmail.com', 'email')
		->type('addresstest'.rand(), 'address')
		->type('0917214096', 'phone')
		->type(bcrypt('847464'), 'password')
		->press('Create')
		->see('User was create successfully!')
		->seePageIs('admin/users');
    }

    public function testAddUserRequest() {
    	$admin = factory(Admin::class)->create();
    	$user = User::first();

        $this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('create')
		->seePageIs('admin/users/create')
		->type('nametest'.rand(), 'name')
		->type($user->email, 'email')
		->type('addresstest'.rand(), 'address')
		->type('0917214096', 'phone')
		->type('123', 'password')
		->press('Create')
		->see('The email has already been taken')
		->see('The password must be at least 6 characters');

		$this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('create')
		->seePageIs('admin/users/create')
		->type($user->name, 'email')
		->press('Create')
		->see('field is required')
		->see('The email must be a valid email address');

    }

    public function testUpdateUser() {
    	$admin = factory(Admin::class)->create();

        $this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('edit')
		->see('Edit user')
		->type('nametest'.rand(), 'name')
		->type('emailtest'.rand().'@gmail.com', 'email')
		->type('addresstest'.rand(), 'address')
		->type('0917214096', 'phone')
		->type(bcrypt('847464'), 'password')
		->press('Update')
		->seePageIs('admin/users')
		->see('User was updated successfully!');
    }

    public function testUpdateUserRequest() {
    	$admin = factory(Admin::class)->create();
    	$user = User::get()->last();

        $this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('edit')
		->see('Edit user')
		->type('nametest'.rand(), 'name')
		->type($user->email, 'email')
		->type('addresstest'.rand(), 'address')
		->type('0917214096', 'phone')
		->type('123', 'password')
		->press('Update')
		->see('The email has already been taken')
		->see('The password must be at least 6 characters');

		$this->actingAs($admin, 'admin')
    	->visit('admin/users')
		->see('Users')
		->click('edit')
		->see('Edit user')
		->type('', 'name')
		->type($user->name, 'email')
		->type('', 'address')
		->type('', 'phone')
		->type('', 'password')
		->press('Update')
		->see('field is required')
		->see('The email must be a valid email address');
    }

    public function testDeleteUser() {
    	$admin = factory(Admin::class)->create();
    	$user = User::get()->first();
    	$isUserId = Order::where('user_id', $user->id)->first();

    	if ($isUserId == null) {
    		$this->actingAs($admin, 'admin')
	    	->visit('admin/users')
	    	->see('Users')
	    	->click('del')
	    	->see('Are you sure delete this user?')
	    	->press('Delete')
	    	->see ('User was deleted successfully!');
    	} else {
    		$this->actingAs($admin, 'admin')
	    	->visit('admin/users')
	    	->see('Users')
	    	->click('del')
	    	->see('Are you sure delete this user?')
	    	->press('Delete')
	    	->see ('You can\'t delete this user!');
    	}
    	
    }
}
