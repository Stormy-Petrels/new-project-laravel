<?php

namespace App\Http\Controllers;

use App\Models\MessageContact;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(){
        $messages = MessageContact::all();
        return view('admin.messagesContact.contactUs', compact('messages'));
    }
}
