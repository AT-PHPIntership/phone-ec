<?php
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
class ContactTest extends TestCase
{
    public function test_show_form_contact()
    {
        $this->visit('/')
        	 ->click('contact')
        	 ->seePageIs('contact')
        	 ->see('Contact Us');
    }
    public function test_show_error_when_enter_miss_required_field()
    {
    	$this->visit('contact')
    		 ->press('send')
    		 ->see('Whoops! Something went wrong!');
    }
    public function test_show_error_when_not_correct_format_email()
    {
        $this->visit('contact')
             ->type('name'.rand(), 'name')
             ->type('email', 'email')
             ->type('enquiry'.rand(), 'enquiry')
             ->press('send')
             ->see('The email must be a valid email address.');
    }
    public function test_show_message_when_send_contact_ok()
    {
        $this->visit('contact')
             ->type('name'.rand(), 'name')
             ->type('email@gmail.com', 'email')
             ->type('enquiry'.rand(), 'enquiry')
             ->press('send')
             ->seeInDatabase('contacts', ['email'=>'email@gmail.com'])
             ->see('Thank you for your contact');
    }
    public function test_show_message_error_when_send_contact_not_ok()
    {
    	$this->visit('contact')
    		 ->type('name'.rand(), 'name')
    		 ->type('email3@gmail.com', 'email')
    		 ->type('enquiry'.rand(), 'enquiry')
    		 ->press('send')
             ->notSeeInDatabase('contacts', ['email'=>'email3@gmail.com'])
             ->see('Your contact count\'t send, please try again');
    }
}
