<?php

namespace App\Http\Controllers;

use App\Models\MessageContact;
use Illuminate\Http\Request;

class MessageContactController extends Controller
{
    public function index(){
        $message = MessageContact::all();
        return view('messagesContact.index', compact('messages'));
    }
}
