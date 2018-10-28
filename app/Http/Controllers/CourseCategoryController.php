<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseCategoryRequest;
use App\CourseCategory;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $course_categories = CourseCategory::get();

        return view('admin.coursecategorys.index', compact('course_categories'));
    }

    public function store(CourseCategoryRequest $request)
    {
        CourseCategory::create($this->validInputs($request, [
            'image' => $request->image->store('uplaod/coursecategories')
        ]));

        return redirect('/admin/courses-categories')->with('success', 'Added Successfully');
    }

    public function show(CourseCategory $course_category)
    {
        return view('admin.coursecategorys.show', compact('course_category'));
    }

    public function edit(CourseCategory $course_category)
    {
        return view('admin.coursecategorys.edit', compact('course_category'));
    }

    public function update(CourseCategory $course_category, CourseCategoryRequest $request)
    {
        $course_category->update($this->validInputs($request, [
            'image' => $request->image->store('uplaod/coursecategories')
        ]));

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy(CourseCategory $course_category)
    {
        $course_category->delete();

        return redirect('/admin/courses-categories')->with('success', 'Deleted successfully');
    }
}
