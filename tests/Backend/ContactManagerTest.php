<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\Backend\Admin;
use App\Models\Backend\Contact;

class ContactManagerTest extends TestCase
{
    public function test_show_content_contact()
    {
        $admin = factory(Admin::class)->create();
        $contact = Contact::first();

        $this->actingAs($admin, 'admin')
             ->visit('admin/contact')
             ->click('show')
             ->seePageIs('admin/contact/'. $contact->id)
             ->see($contact->name)
             ->click('Cancel')
             ->seePageIs('admin/contact');
    }

    public function test_delete_contact()
    {
    	$admin = factory(Admin::class)->create();
    	$contact = Contact::first();

    	$this->actingAs($admin, 'admin')
    		 ->visit('admin/contact')
    		 ->click('del')
    		 ->see('Are you sure delete this contact?')
    		 ->press('Delete')
    		 ->notSeeInDatabase('contacts', ['name' => $contact->email])
    		 ->see('Contact was delete successfully!');
    }
}
