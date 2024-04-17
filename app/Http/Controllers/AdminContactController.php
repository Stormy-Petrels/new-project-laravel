<?php

namespace App\Http\Controllers;

use App\Models\MessageContact;
use Illuminate\Http\Request;
use App\Repositories\ContactRepository;
use GuzzleHttp\Psr7\Message;

class AdminContactController extends Controller
{
    // private $contactRepository ;
    // public function __construct(ContactRepository $contactRepository)
    // {
    //     $this->contactRepository = $contactRepository;
    // }
    
    public function index(){
        $messages = MessageContact::all();
        return view('admin.messagesContact.contactUs', compact('messages'));
    }

    // public function updateStatus(Request $request, $id)
    // {
    //     $newStatus = $request->input('status');
    //     $currentStatus = $this->contactRepository->get_contacts($id);

    //     if ($currentStatus === 'Processing') {
    //         $result = $this->contactRepository->updateContactStatus($id, $newStatus);
    //         if ($result) {
    //             $contacts = $this->contactRepository->get_contacts(); // Lấy danh sách liên hệ
    //             return view('admin.contacts.index', compact('contacts'))->with('status', 'Status updated successfully');
    //         }
    //     } else {
         
    //     }
    // }

    public function update_contact_message($id)
{
    $message = MessageContact::find($id);
    if ($message) {
        $message->status = $message->status ? 0 : 1;
        $message->save();
    }
    return redirect()->route('admin.contact');
}
}
