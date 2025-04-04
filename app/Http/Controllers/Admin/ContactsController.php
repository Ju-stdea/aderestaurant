<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function listContact(){
        $contacts = Contact::get(); 
        return view('admin.contacts.list_contacts')->with(compact('contacts'));
    }

    public function deleteContact($id){
        Contact::where('id', $id)->delete();
        $message = 'contacts been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
