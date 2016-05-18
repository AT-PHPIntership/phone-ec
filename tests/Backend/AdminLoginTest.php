<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;

class AdminLoginTest extends TestCase
{
	public function selectAdmin()
	{
		$admin = Admin::first();
		return $admin;
	}

    /**
     * A admin login test.
	 *
     * @return void
     */
    public function testLogin()
    {
        $this->visit('admin/login')
             ->type($this->selectAdmin()->email, 'email')
		     ->type('admin1', 'password')
		     ->press('Login')
		     ->seePageIs('admin/dashboard');	
    }

    public function testLoginRequest(){
        //Email and password field are empty
        $this->visit('admin/login')
             ->type('', 'email')
             ->type('', 'password')
             ->press('Login')
             ->see('field is required');

        //Email is correct, password is wrong
        $this->visit('admin/login')
             ->type($this->selectAdmin()->email, 'email')
             ->type(rand(), 'password')
             ->press('Login')
             ->see('These credentials do not match our records');
        
        //Email is wrong, password is correct
        $this->visit('admin/login')
             ->type(rand().'@gmail.com', 'email')
             ->type('admin1', 'password')
             ->press('Login')
             ->see('These credentials do not match our records');
    }
}
