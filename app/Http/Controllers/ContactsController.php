<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactsController extends Controller
{

    public function index()
    {
        $contacts = Contacts::latest()->paginate(3);
        return view('admin.messages.index', compact('contacts'));
    }

    public function destroy(Contacts $message)
    {
        $message->delete();

        return back()->with('success', 'Deleted successfully');
    }

    public function read(Contacts $message)
    {
        $message->read();

        return back();
    }
}
