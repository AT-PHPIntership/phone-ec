<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Controllers\Controller;
use App\Models\Frontend\Contact;
use Mail;

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
        // sent mail to polishop successully
        if ($this->sendMail($request)) {
            // save contact to database
            $contact = new Contact;

            $contact->name    = $request->name;
            $contact->email   = $request->email;
            $contact->enquiry = $request->enquiry;

            $contact->save();

            if (!$contact) {
                $request->session()->flash('message', 'Your contact count\'t send, please try again');
            } else {
                $request->session()->flash('message', 'Thank you for your contact');
            }

            return redirect()->route('getContact');
        } else {
            // sent mail to polishop not successfully
            $request->session()->flash('message', 'Your contact count\'t send, please try again');
            return redirect()->route('getContact');
        }
    }

    /**
     * Function send mail to mail of polishop, when user send contact.
     *
     * @param \Illuminate\Http\Request $request request for send mail
     *
     * @return \Illuminate\Http\Response
     */
    private function sendMail($request)
    {
        $data = [
            'name'    => $request->name,
            'email'   => $request->email,
            'enquiry' => $request->enquiry,
        ];

        Mail::send('frontend.dashboard.mail', $data, function ($message) {
            $message->from('intership.asiantech@gmail.com', 'user');
            $message->to('intership.asiantech@gmail', 'Polishop')->subject('This is contact form User');
        });

        // check mail sent successfully?
        return count(Mail::failures()) > 0 ? false : true;
    }
}
