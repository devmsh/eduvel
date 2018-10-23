<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller
{
    public function index()
    {

        $newsletter = Newsletter::orderBy('id', 'desc')->get();
        return view('admin.newsletter.index', compact('newsletter'));
    }

    public function destroy($id)
    {
        Newsletter::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
}
