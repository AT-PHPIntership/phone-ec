<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.dashboard.contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request request for create
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = new Contact;

        $contact->name    = $request->name;
        $contact->email   = $request->email;
        $contact->enquiry = $request->enquiry;

        $contact->save();

        if (!$contact) {
            $request->session()->flash('message', 'Your contact count\'t send, please try againt');
        } else {
            $request->session()->flash('message', 'Thank you for your contact');
        }

        return redirect()->route('getContact');
    }
}
