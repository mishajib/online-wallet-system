<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('backend.admin.contact.contact', compact('contacts'));
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

        $setting = Setting::first();
        $sender_email = $request->email;
        $receiver_email = "no-reply@ows.com";
        $subject = $request->subject;
        $message = $request->body;
        $headers = "From: $setting->site_name <$sender_email> \r\n";
        $headers .= "Reply-To: <$receiver_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        if (@mail($receiver_email, $subject, $message, $headers)) {
            $contact->save();
            return back()->with('success', 'Message sent successfully');
        } else {
            return back()->with('error', 'Please try again!!!');
        }

    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.admin.contact.show', compact('contact'));
    }

    public function replySendMail($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.admin.contact.reply', compact('contact'));
    }

    public function replyMail(Request $request, $id)
    {
        $request->validate([
            'body' => 'bail|required|string'
        ]);
        $contact = findOrFail($id);
        $setting = Setting::first();
        $sender_email = "no-reply@ows.com";
        $receiver_email = $contact->email;
        $subject = $contact->subject;
        $message = $request->body;
        $headers = "From: $setting->site_name <$sender_email> \r\n";
        $headers .= "Reply-To: <$receiver_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=utf-8\r\n";
        if (@mail($receiver_email, $subject, $message, $headers)) {
            return back()->with('success', 'Replied successfully');
        } else {
            return back()->with('error', 'Please try again!!!');
        }
    }
}
