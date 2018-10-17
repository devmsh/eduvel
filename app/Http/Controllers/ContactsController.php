<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactsController extends Controller
{
    
    public function index()
    {
        $contacts = Contacts::orderBy('id', 'desc')->paginate(3);
        return view('admin.messages.index', compact('contacts'));
    }

    public function done_read($id)
    {
        $add = Contacts::find($id);
        $add->done_read = 1;
        $add->save();

        return back();
    }

    public function destroy($id)
    {
        Contacts::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
}
