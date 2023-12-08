<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function submitContactForm(Request $request)
    {
       
       $validatedata = $request->validate([
            'name'      => 'required|string',
            'email'     => 'required|email',
            'message'   =>'required|string',
        ]);
        
        ContactMessage::create($validatedata);

        return redirect()->back()->with('sussess', 'Message sent successfully!');
    }


}
