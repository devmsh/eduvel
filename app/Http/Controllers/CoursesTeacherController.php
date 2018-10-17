<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;
use App\Courses;
use App\CoursesFiles;
use App\CourseComment;
use App\User;
use App\CourseFiles;
use App\Helpers\EducationAlzardHelpers;

class CoursesTeacherController extends Controller
{

    public function dashboard(){

        $count_courses = Courses::where('user_id', auth()->user()->id)->where('isActive', 1)->count();
        $count_inactive_courses = Courses::where('user_id', auth()->user()->id)->where('isActive', 0)->count();

        $myCourses = Courses::where('user_id', auth()->user()->id)->get();
        $count_comments = 0;
        foreach ($myCourses as $myCourse) {
            $count_comments = $count_comments + CourseComment::where('course_id', $myCourse->id)->where('dane_read', 0)->count();
        }
        
        return view('teacher.home', compact('count_courses', 'count_inactive_courses', 'count_comments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_categorys = CourseCategory::get();
        $courses = Courses::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->paginate(3);

        return view('teacher.courses.index', compact('course_categorys', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_categorys = CourseCategory::get();
        return view('teacher.courses.create', compact('course_categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $courses = $this->validate(request(),[
            'course_title' => 'required',
            'teacher_name' => 'required',
            'course_start' => 'required',
            'course_price' => 'required',
            'course_image' => 'required',
            'course_video' => 'required',
            'course_description' => 'required',
            'category_id' => 'required',
            'course_time' => 'required',
            'what_will_you_learn_title' => 'required',
            'what_will_you_learn_description' => 'required',
        ]);


        if (!empty(request('course_image'))) {
            $course_image_name = time() . '.' . $request->course_image->getClientOriginalExtension();
        }
        if (!empty(request('course_video'))) {
            $course_video_name = time()*2 . '.' . $request->course_video->getClientOriginalExtension();
        }

        $add = new Courses();
        $add->user_id = auth()->user()->id;
        $add->course_title = request('course_title');
        $add->teacher_name = request('teacher_name');
        $add->course_start = request('course_start');
        $add->course_expire = request('course_expire');
        $add->course_price = request('course_price');
        $add->course_discount_price = request('course_discount_price');
        $add->course_image = $course_image_name;
        $add->course_video = $course_video_name;
        $add->course_description = request('course_description');
        $add->category_id = request('category_id');
        $add->coupon_code = request('coupon_code');
        $add->coupon_code_discount_price = request('coupon_code_discount_price');
        $add->whats_includes = request('whats_includes');
        $add->isActive = 0;
        $add->course_time = request('course_time');
        $add->what_will_you_learn_title = json_encode(request('what_will_you_learn_title'));
        $add->what_will_you_learn_description = json_encode(request('what_will_you_learn_description'));
        $add->save();

        if (!empty(request('course_image'))) {

            $request->course_image->move(public_path('uplaod/courses/coursesimages/'), $course_image_name);
        }
        if (!empty(request('course_video'))) {

            $request->course_video->move(public_path('uplaod/courses/coursesvideos/'), $course_video_name);
        }

        $select = Courses::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        $add = new CoursesFiles();
        $add->video_title = json_encode(request('video_title'));
        $add->video_category = json_encode(request('video_category'));
        $add->video_url = json_encode(request('video_url'));
        $add->course_id = $select->id;
        $add->save();       

        session()->flash('success', 'Successfully added');
        
        return redirect('/dashboard/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Courses::where('user_id', auth()->user()->id)->find($id);
        $course_categorys = CourseCategory::get();
        return view('teacher.courses.edit', compact('course', 'course_categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){

        $courses = $this->validate(request(),[
            'course_title' => 'required',
            'teacher_name' => 'required',
            'course_start' => 'required',
            'course_price' => 'required',
            'course_image' => 'image|jbeg,png,gif,jpg',
            'course_description' => 'required',
            'category_id' => 'required',
            'course_time' => 'required',
            'what_will_you_learn_title' => 'required',
            'what_will_you_learn_description' => 'required',
        ]);

        $course = Courses::where('id', request('id'))->where('user_id', auth()->user()->id)->first();

        if (!empty(request('course_image'))) {
            $course_image_name = time() . '.' . $request->course_image->getClientOriginalExtension();
        }else{
            $course_image_name = $course->course_image;
        }
        if (!empty(request('course_video'))) {
            $course_video_name = time()*2 . '.' . $request->course_video->getClientOriginalExtension();
        }else{
            $course_video_name = $course->course_video;
        }

        $add = Courses::find($course->id);
        $add->course_title = request('course_title');
        $add->teacher_name = request('teacher_name');
        $add->course_start = request('course_start');
        $add->course_expire = request('course_expire');
        $add->course_price = request('course_price');
        $add->course_discount_price = request('course_discount_price');
        $add->course_image = $course_image_name;
        $add->course_video = $course_video_name;
        $add->course_description = request('course_description');
        $add->category_id = request('category_id');
        $add->coupon_code = request('coupon_code');
        $add->coupon_code_discount_price = request('coupon_code_discount_price');
        $add->whats_includes = request('whats_includes');
        $add->course_time = request('course_time');
        $add->what_will_you_learn_title = json_encode(request('what_will_you_learn_title'));
        $add->what_will_you_learn_description = json_encode(request('what_will_you_learn_description'));
        $add->save();

        if (!empty(request('course_image'))) {

            $request->course_image->move(public_path('uplaod/courses/coursesimages/'), $course_image_name);
        }
        if (!empty(request('course_video'))) {

            $request->course_video->move(public_path('uplaod/courses/coursesvideos/'), $course_video_name);
        }

        $select = CoursesFiles::where('course_id', $course->id)->first();

        $add = CoursesFiles::find($select->id);
        $add->video_title = json_encode(request('video_title'));
        $add->video_category = json_encode(request('video_category'));
        $add->video_url = json_encode(request('video_url'));
        $add->save();       

        session()->flash('success', 'Successfully updated');
        
        return back();
    }

    public function searsh_category($courses_category){

        $courses_category = CourseCategory::select(array('id', 'name'))
                        ->orWhere('name', 'LIKE', '%'.$courses_category.'%')                        
                        ->first();

        $course_categorys = CourseCategory::get();
        $courses = Courses::where('category_id', $courses_category->id)->where('user_id', auth()->user()->id)->paginate(3);

        return view('teacher.courses.index', compact('course_categorys', 'courses'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Courses::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }

    public function all_comments(){

        $get_comments = CourseComment::/*where('course_id', 2)->*/get();
        // return $get_comments;

        $user_id = CourseComment::select('user_id')->/*where('course_id', 2)->*/get()->toarray();
        $user = [];
        $length_users = count($user_id);
        // return $user_id;
        for ($i = 0; $i < $length_users; $i++) {

            $user[$i] = User::where('id', $user_id[$i]['user_id'])->first();
        }


        $course = Courses::where('user_id', auth()->user()->id)->first();

        $comments = array_map(null, $get_comments->toArray(), $user);

        return view('teacher.courses.allComments', compact('comments'));
    }
    public function dane_read_comment($id){
        
        $update = CourseComment::find($id);
        $update->dane_read = 1;
        $update->save();       

        // session()->flash('success', 'Successfully Dane Read');
        
        return back();

    }

    public function add_course_files(){
        
        $course_categorys = CourseCategory::get();
        $courses = Courses::where('user_id', auth()->user()->id)->get();
        $courseFiles = CourseFiles::where('user_id', auth()->user()->id)->where('isActive', 1)->get();

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

        $courseFiles = CourseFiles::where('id', $id)->where('user_id', auth()->user()->id)->delete();
        // CourseFiles::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return back();
    }

}
