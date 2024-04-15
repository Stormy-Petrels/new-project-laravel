<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show() {
        return view('patients.contactUs');
    }
    public function send(Request $request){
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message' => 'required|min:5',
        ]);

        // Send email to admin
        Mail::to('hoai.nguyen25@student.passerellesnumeriques.org')->send(new ContactUs($data));
        // dd('send');
        // return redirect()->back()->with('msg', 'Thanks for reaching out. Your message has been sent successfully.');
        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }    
    
}
