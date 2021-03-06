<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $title = "All Contacts";
        $contacts = Contact::latest()->paginate(10);
        return view('backend.admin.contact.contact', compact('contacts', 'title'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'name' => 'bail|required|string',
            'phone' => 'bail|required',
            'email' => 'bail|required|email',
            'subject' => 'bail|required|string',
            'body' => 'bail|required|string',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->body = $request->body;

        $sender_email = $request->email;
        $receiver_email = "no-reply@ows.com";
        $subject = $request->subject;
        $message = $request->body;
        if (sendMail($receiver_email, $subject, $message, $sender_email)) {
            $contact->save();
            return back()->with('success', 'Message sent successfully');
        } else {
            return back()->with('error', 'Please try again!!!');
        }

    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        $title = $contact->subject;
        return view('backend.admin.contact.show', compact('contact', 'title'));
    }

    public function replySendMail($id)
    {
        $contact = Contact::findOrFail($id);
        $title = $contact->subject;
        return view('backend.admin.contact.reply', compact('contact', 'title'));
    }

    public function replyMail(Request $request, $id)
    {
        $request->validate([
            'body' => 'bail|required|string'
        ]);
        $contact = Contact::findOrFail($id);
        $receiver_email = $contact->email;
        $subject = $contact->subject;
        $message = $request->body;
        if (sendMail($receiver_email, $subject, $message)) {
            return back()->with('success', 'Replied successfully');
        } else {
            return back()->with('error', 'Please try again!!!');
        }
    }

    public function contactSearch(Request $request)
    {
        $request->validate([
            'query' => 'bail|required|string'
        ]);
        $query = $request->input('query');
        $title = $query;
        $contacts = Contact::where('email', $query)->orWhere('phone', $query)->get();
        if ($contacts->isEmpty()) {
            return back()->with('error', 'Contact doesn\'t exists!!!');
        }
        return view('backend.admin.search.contact_search', compact('query', 'contacts', 'title'));
    }
}
