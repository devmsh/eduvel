<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseComment;
use App\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comments = CourseComment::with('user','course')->get();

        return view('teacher.courses.allComments', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(CourseComment $courseComment)
    {
        //
    }

    public function edit(CourseComment $courseComment)
    {
        //
    }

    public function update(Request $request, CourseComment $courseComment)
    {
        //
    }

    public function destroy(CourseComment $courseComment)
    {
        //
    }

    public function read(CourseComment $comment)
    {
        $comment->read();

        return back()->with('success', 'Successfully Dane Read');
    }
}
