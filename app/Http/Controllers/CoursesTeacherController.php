<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
use Illuminate\Http\Request;
use App\CourseCategory;
use App\Course;
use App\CoursesFiles;
use App\CourseComment;
use App\User;
use App\CourseFiles;
use App\Helpers\EducationAlzardHelpers;
use Illuminate\Support\Facades\View;

class CoursesTeacherController extends Controller
{
    public function __construct()
    {
        View::composer('teacher.courses.*', function ($view) {
            $view->with('course_categorys', CourseCategory::all());
        });
    }

    public function index()
    {
        $courses = request()->user()->courses()->latest()
            ->when(request('category_id'), function ($query) {
                return $query->where('category_id', request('category_id'));
            })->paginate(3);

        return view('teacher.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('teacher.courses.create');
    }

    public function store(CourseRequest $request)
    {
        Course::createFor($request->user(), $this->validInputs($request, [
            'isActive' => 0,
            'course_image' => $request->course_image->store('upload/courses')
        ]));

        return redirect('/dashboard/courses')->with('success', 'Successfully added');
    }

    public function edit(Course $course)
    {
        return view('teacher.courses.edit', compact('course'));
    }

    public function update(Course $course, CourseRequest $request)
    {
        $course->updateFor($request->user(), $this->validInputs($request, [
            'course_image' => $request->course_image->store('upload/courses')
        ]));

        return back()->with('success', 'Successfully added');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Deleted successfully');
    }

    public function all_comments()
    {

        $get_comments = CourseComment::/*where('course_id', 2)->*/
        get();
        // return $get_comments;

        $user_id = CourseComment::select('user_id')->/*where('course_id', 2)->*/
        get()->toarray();
        $user = [];
        $length_users = count($user_id);
        // return $user_id;
        for ($i = 0; $i < $length_users; $i++) {

            $user[$i] = User::where('id', $user_id[$i]['user_id'])->first();
        }

        $course = Course::where('user_id', auth()->user()->id)->first();

        $comments = array_map(null, $get_comments->toArray(), $user);

        return view('teacher.courses.allComments', compact('comments'));
    }

    public function dane_read_comment($id)
    {

        $update = CourseComment::find($id);
        $update->dane_read = 1;
        $update->save();

        // session()->flash('success', 'Successfully Dane Read');

        return back();

    }

    public function add_course_files()
    {

        $course_categorys = CourseCategory::get();
        $courses = Course::where('user_id', auth()->user()->id)->get();
        $courseFiles = CourseFiles::where('user_id', auth()->user()->id)->where('isActive', 1)->get();

        return view('teacher.courses.files', compact('course_categorys', 'courses', 'courseFiles'));
    }

    public function store_course_files(Request $request)
    {

        if (!empty(request('file_name'))) {
            $file = request()->file('file_name');
            $size_bytes = $file->getSize();
            $mimtype = $file->getMimeType();

            $file_name = request('name') . time() . '.' . $request->file_name->getClientOriginalExtension();
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

    public function file_delete($id)
    {

        $courseFiles = CourseFiles::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        // CourseFiles::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return back();
    }

    public function dashboard()
    {
        $count_courses = Course::where('user_id', auth()->user()->id)->where('isActive', 1)->count();
        $count_inactive_courses = Course::where('user_id', auth()->user()->id)->where('isActive', 0)->count();

        $myCourses = Course::where('user_id', auth()->user()->id)->get();
        $count_comments = 0;
        foreach ($myCourses as $myCourse) {
            $count_comments = $count_comments + CourseComment::where('course_id', $myCourse->id)->where('dane_read', 0)->count();
        }

        return view('teacher.home', compact('count_courses', 'count_inactive_courses', 'count_comments'));
    }

}
