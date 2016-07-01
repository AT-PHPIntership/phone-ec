<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\User;
class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testWebLogin() {
    	$user = User::first();

    	//Test login
        $this->visit('/login')
        ->type($user->email, 'email')
        ->type('847464', 'password')
        ->press('Login')
        ->seePageIs('/')
        ->see($user->name)

        //Test logout
        ->see('Logout')
        ->click('Logout')
        ->seePageIs('/')

        //Test login request
        ->visit('/login')

        //Email and password field are empty
        ->type('', 'email')
        ->type('', 'password')
        ->press('Login')
        ->see('The email field is required.')
        ->see('The password field is required.')

        //Email is correct, password is wrong
        ->type($user->email, 'email')
        ->type('wrongpassword', 'password')
        ->press('Login')
        ->see('These credentials do not match our records.')

        //Email is wrong, password is correct
        ->type('wrongemail@gmail.com', 'email')
        ->type('847464', 'password')
        ->press('Login')
        ->see('These credentials do not match our records.');
    }

    public function testWebRegister() {
    	$user = User::first();

    	//Test Register
    	$this->visit('/register')
        ->type($user->name.'testlogin','name')
        ->type('testregister'.rand().'@gmail.com','email')
        ->type($user->phone,'phone')
        ->type($user->address,'address')
        ->type('847464','password')
        ->type('847464','password_confirmation')
        ->press('Register')
        ->seePageIs('/')
        ->see($user->name.'testlogin')

        //Test Register request
        ->click('Logout')
        ->seePageIs('/')
        ->visit('/register')

        //Field are empty
        ->type('','name')
        ->type('','email')
        ->type('','phone')
        ->type('','address')
        ->type('','password')
        ->type('','password_confirmation')
        ->press('Register')
        ->see('field is required.')

        //Email has already been taken
        ->type('testname','name')
        ->type($user->email,'email')
        ->type($user->phone,'phone')
        ->type($user->address,'address')
        ->type('847464','password')
        ->type('847464','password_confirmation')
        ->press('Register')
        ->see('The email has already been taken.')

        //Password confirmation does not match.
        ->type($user->name.'testlogin','name')
        ->type($user->name.rand().'@gmail.com','email')
        ->type($user->phone,'phone')
        ->type($user->address,'address')
        ->type('847464','password')
        ->type('','password_confirmation')
        ->press('Register')
        ->see('The password confirmation does not match.');
    }
}
