<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscribe;
use Illuminate\Support\Facades\Session;

class NewsletterController extends Controller
{
    public function listNewsletter(){
        $newsletters = Subscribe::get(); 
        return view('admin.newsletters.list_newsletters')->with(compact('newsletters'));
    }

    public function deleteNewsletter($id){
        Subscribe::where('id', $id)->delete();
        $message = 'subscriber been deleted successfully';
        session::flash('success_message', $message);
        return redirect()->back();
    }
}
