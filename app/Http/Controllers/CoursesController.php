<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Courses;
use App\CoursesFiles;

class CoursesController extends Controller
{
    public function index()
    {

        $course_categorys = CourseCategory::get();
        $courses = Courses::orderBy('id', 'desc')->paginate(3);

        return view('admin.courses.index', compact('course_categorys', 'courses'));
    }

    public function create()
    {
        $course_categorys = CourseCategory::get();
        return view('admin.courses.create', compact('course_categorys'));
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

        Courses::createFor($request->user(),$data);

        return redirect('/admin/courses')->with('success', 'Successfully added');
    }

    public function edit($id)
    {

        $course = Courses::find($id);
        $course_categorys = CourseCategory::get();
        return view('admin.courses.edit', compact('course', 'course_categorys'));
    }

    public function update(Courses $course,CourseRequest $request)
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

        $course->updateFor($request->user(),$data);

        return back()->with('success', 'Successfully added');
    }

    public function approve(Courses $course)
    {
        $course->approve();

        return back()->with('success', 'Approved successfully');
    }

    public function searsh_category($courses_category)
    {
        $courses_category = CourseCategory::select(array('id', 'name'))
            ->orWhere('name', 'LIKE', '%' . $courses_category . '%')
            ->first();

        $course_categorys = CourseCategory::get();
        $courses = Courses::where('category_id', $courses_category->id)->paginate(3);

        return view('admin.courses.index', compact('course_categorys', 'courses'));
    }

    public function destroy(Courses $course)
    {
        $course->delete();

        return back()->with('success', 'Deleted successfully');
    }

}
