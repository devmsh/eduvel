<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\CourseCategory;
use App\Course;
use Illuminate\Support\Facades\View;

class CoursesController extends Controller
{
    public function __construct()
    {
        View::composer('admin.courses.*', function ($view) {
            $view->with('course_categorys',CourseCategory::all());
        });
    }

    public function index()
    {
        $courses = Course::latest()->when(request('category_id'),function($query){
            return $query->where('category_id',request('category_id'));
        })->paginate(3);

        return view('admin.courses.index', compact( 'courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(CourseRequest $request)
    {
        Course::createFor($request->user(), $this->validInputs($request,[
            'course_image' => $request->course_image->store('upload/courses')
        ]));

        return redirect('/admin/courses')->with('success', 'Successfully added');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Course $course, CourseRequest $request)
    {
        $course->updateFor($request->user(), $this->validInputs($request,[
            'course_image' => $request->course_image->store('upload/courses')
        ]));

        return back()->with('success', 'Successfully added');
    }

    public function approve(Course $course)
    {
        $course->approve();

        return back()->with('success', 'Approved successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
