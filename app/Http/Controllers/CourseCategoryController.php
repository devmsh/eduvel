<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseCategoryRequest;
use App\CourseCategory;

class CourseCategoryController extends Controller
{
    public function index()
    {
        $course_categories = CourseCategory::get();

        return view('admin.courses-categories.index', compact('course_categories'));
    }

    public function store(CourseCategoryRequest $request)
    {
        CourseCategory::create($this->validInputs($request, [
            'image' => $request->image->store('upload/courses-categories')
        ]));

        return redirect('/admin/courses-categories')->with('success', 'Added Successfully');
    }

    public function show(CourseCategory $courses_category)
    {
        return view('admin.courses-categories.show', compact('courses_category'));
    }

    public function edit(CourseCategory $courses_category)
    {
        return view('admin.courses-categories.edit', compact('courses_category'));
    }

    public function update(CourseCategory $courses_category, CourseCategoryRequest $request)
    {
        $courses_category->update($this->validInputs($request, [
            'image' => $request->image->store('upload/courses-categories')
        ]));

        return back()->with('success', 'Updated Successfully');
    }

    public function destroy(CourseCategory $courses_category)
    {
        $courses_category->delete();

        return redirect('/admin/courses-categories')->with('success', 'Deleted successfully');
    }
}
