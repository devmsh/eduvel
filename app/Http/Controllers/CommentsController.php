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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CourseComment  $courseComment
     * @return \Illuminate\Http\Response
     */
    public function show(CourseComment $courseComment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CourseComment  $courseComment
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseComment $courseComment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CourseComment  $courseComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseComment $courseComment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CourseComment  $courseComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseComment $courseComment)
    {
        //
    }
}
