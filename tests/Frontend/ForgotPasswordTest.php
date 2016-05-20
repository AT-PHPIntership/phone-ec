<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\User;
use App\Models\Backend\Password;

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
        ->see('We can\'t find a user with that e-mail address.')

        //Test send email success
        ->type($user->email, 'email')
        ->press('Send Password Reset Link')
        ->see('We have e-mailed your password reset link!');

        //Check Token after send password reset link
        $token = Password::where('email', $user->email)->first();
        $this->seeInDatabase('password_resets', ['token' => $token['token']])

        //Get token reset password fromt table reset password 
        ->visit('/password/reset/'.$token['token'].'?email='.$token['email'])
        ->see('Create New Password')
        ->see($token['email'])

        //Test password field is required
        ->type('', 'password')
        ->type('', 'password_confirmation')
        ->press('Reset Password')
        ->see('The password field is required.')

        //Test password confirmation does not match
        ->type('testpasswordreset', 'password')
        ->type('', 'password_confirmation')
        ->press('Reset Password')
        ->see('The password confirmation does not match.')

        //Test reset password success then scroll to home page and see name of who reset password on header
        ->type('123456', 'password')
        ->type('123456', 'password_confirmation')
        ->press('Reset Password')
        ->seePageIs('/')
        ->see($user->name);

    }
}
