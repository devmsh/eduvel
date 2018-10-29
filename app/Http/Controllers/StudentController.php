<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\User;
use App\Admission;

class StudentController extends Controller
{
    public function index()
    {
        $users = User::role('Student')->get();

        return view('admin.users.students', compact('users'));
    }
}
