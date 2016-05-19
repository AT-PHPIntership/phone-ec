<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\User;

class ForgotPasswordTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testForgotPassWord() {
    	$user = User::get()->first();

        $this->visit('/')
        ->see('Login')
        ->click('Login')
        ->seePageIs('/login')
        ->see('Forgotten Password')
        ->click('Forgotten Password')
        ->seePageIs('/password/reset')
        ->see('Reset Password')
        //Test send email success
        ->type($user->email, 'email')
        ->press('Send Password Reset Link')
        ->see('We have e-mailed your password reset link!')
        //Check Token
        ->seeInDatabase('password_resets', ['email' => $user->email])
        //Test email field is required
        ->type('', 'email')
        ->press('Send Password Reset Link')
        ->see('The email field is required.')
        //Test email must be a valid email address
        ->type('abctestemail', 'email')
        ->press('Send Password Reset Link')
        ->see('The email must be a valid email address.')
        //Test cant find a user with that e-mail address
        ->type('abctestemail@gmail.com', 'email')
        ->press('Send Password Reset Link')
        ->see('We can\'t find a user with that e-mail address.');
    }
}
