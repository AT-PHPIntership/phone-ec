<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Backend\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.contacts.index', compact('contacts'));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contacts.view', compact('contact'));
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param \Illuminate\Http\Request $request request for contact
     * @param int                      $id      id contact
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        if ($contact->delete()) {
            $request->session()->flash('message', 'Contact was delete successfully!');
        } else {
            $request->session()->flash('message', 'Wrong!, Can\'t delete this Contact, please try againt!');
        }
        return redirect()->route('admin.contacts.index');
    }
}
