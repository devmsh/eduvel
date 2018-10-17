<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use App\Courses;
use App\CourseFiles;
use App\User;
use App\Helpers\EducationAlzardHelpers;

class CourseFilesController extends Controller
{
    public function add_course_files(){
        
        $course_categorys = CourseCategory::get();
        $courses = Courses::get();
        $courseFiles = CourseFiles::where('isActive', 1)->get();

        return view('teacher.courses.files', compact('course_categorys', 'courses', 'courseFiles'));
    }

    public function store_course_files(Request $request){

        if (!empty(request('file_name'))) {
            $file = request()->file('file_name');
            $size_bytes = $file->getSize();
            $mimtype = $file->getMimeType();

            $file_name= request('name') . time() . '.' . $request->file_name->getClientOriginalExtension();
            $request->file_name->move(public_path('uplaod/courses/files/'), $file_name);
        }

        $add = new CourseFiles();
        $add->name = request('name');
        $add->file_name = $file_name;
        $add->size = $size_bytes;
        $add->type_file = $mimtype;
        $add->user_id = auth()->user()->id;
        $add->course_id = request('course_id');
        $add->isActive = 1;
        $add->save();

        session()->flash('success', 'Successfully Added');
        return back();
    }

    public function file_delete($id){

        // $courseFiles = CourseFiles::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        CourseFiles::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return back();
    }



}
