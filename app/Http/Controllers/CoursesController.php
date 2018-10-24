<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use App\CourseCategory;
use App\Courses;
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
        $courses = Courses::latest()->when(request('category_id'),function($query){
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
        $data = $request->only([
            'course_title', 'teacher_name', 'course_start',
            'course_expire', 'course_price', 'course_discount_price',
            'course_image', 'course_video', 'course_description',
            'category_id', 'coupon_code', 'coupon_code_discount_price',
            'whats_includes', 'isActive', 'course_time',
            'what_will_you_learn_title', 'what_will_you_learn_description',
            'video_title', 'video_category', 'video_url',
        ]);

        $data['course_image'] = $request->course_image->store('upload/courses');

        Courses::createFor($request->user(), $data);

        return redirect('/admin/courses')->with('success', 'Successfully added');
    }

    public function edit(Courses $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Courses $course, CourseRequest $request)
    {
        $data = $request->only([
            'course_title', 'teacher_name', 'course_start',
            'course_expire', 'course_price', 'course_discount_price',
            'course_image', 'course_video', 'course_description',
            'category_id', 'coupon_code', 'coupon_code_discount_price',
            'whats_includes', 'isActive', 'course_time',
            'what_will_you_learn_title', 'what_will_you_learn_description',
            'video_title', 'video_category', 'video_url',
        ]);

        $data['course_image'] = $request->course_image->store('upload/courses');

        $course->updateFor($request->user(), $data);

        return back()->with('success', 'Successfully added');
    }

    public function approve(Courses $course)
    {
        $course->approve();

        return back()->with('success', 'Approved successfully');
    }

    public function destroy(Courses $course)
    {
        $course->delete();

        return back()->with('success', 'Deleted successfully');
    }
}
