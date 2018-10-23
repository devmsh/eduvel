<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {

        $courses = $this->validate(request(), [
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
        /*if (!empty(request('course_video'))) {
            $course_video_name = time()*2 . '.' . $request->course_video->getClientOriginalExtension();
        }*/
        //  preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/",  request('video'), $matches);
        // $course_video_name = $matches[1];

        $add = new Courses();
        $add->user_id = auth()->user()->id;
        $add->course_title = request('course_title');
        $add->teacher_name = request('teacher_name');
        $add->course_start = request('course_start');
        $add->course_expire = request('course_expire');
        $add->course_price = request('course_price');
        $add->course_discount_price = request('course_discount_price');
        $add->course_image = $course_image_name;
        $add->course_video = request('course_video');
        $add->course_description = request('course_description');
        $add->category_id = request('category_id');
        $add->coupon_code = request('coupon_code');
        $add->coupon_code_discount_price = request('coupon_code_discount_price');
        $add->whats_includes = request('whats_includes');
        $add->isActive = request('isActive');
        $add->course_time = request('course_time');
        $add->what_will_you_learn_title = json_encode(request('what_will_you_learn_title'));
        $add->what_will_you_learn_description = json_encode(request('what_will_you_learn_description'));
        $add->save();

        if (!empty(request('course_image'))) {

            $request->course_image->move(public_path('uplaod/courses/coursesimages/'), $course_image_name);
        }
        // if (!empty(request('course_video'))) {

        //     $request->course_video->move(public_path('uplaod/courses/coursesvideos/'), $course_video_name);
        // }

        $select = Courses::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

        $add = new CoursesFiles();
        $add->video_title = json_encode(request('video_title'));
        $add->video_category = json_encode(request('video_category'));
        $add->video_url = json_encode(request('video_url'));
        $add->course_id = $select->id;
        $add->save();

        session()->flash('success', 'Successfully added');

        return redirect('/admin/courses');
    }

    public function edit($id)
    {

        $course = Courses::find($id);
        $course_categorys = CourseCategory::get();
        return view('admin.courses.edit', compact('course', 'course_categorys'));
    }

    public function update(Request $request)
    {

        $courses = $this->validate(request(), [
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

        $course = Courses::where('id', request('id'))->first();

        if (!empty(request('course_image'))) {
            $course_image_name = time() . '.' . $request->course_image->getClientOriginalExtension();
        } else {
            $course_image_name = $course->course_image;
        }
        // if (!empty(request('course_video'))) {
        //     $course_video_name = time()*2 . '.' . $request->course_video->getClientOriginalExtension();
        // }else{
        //     $course_video_name = $course->course_video;
        // }

        $add = Courses::find(request('id'));
        $add->course_title = request('course_title');
        $add->teacher_name = request('teacher_name');
        $add->course_start = request('course_start');
        $add->course_expire = request('course_expire');
        $add->course_price = request('course_price');
        $add->course_discount_price = request('course_discount_price');
        $add->course_image = $course_image_name;
        $add->course_video = request('course_video');
        $add->course_description = request('course_description');
        $add->category_id = request('category_id');
        $add->coupon_code = request('coupon_code');
        $add->coupon_code_discount_price = request('coupon_code_discount_price');
        $add->whats_includes = request('whats_includes');
        $add->isActive = request('isActive');
        $add->course_time = request('course_time');
        $add->what_will_you_learn_title = json_encode(request('what_will_you_learn_title'));
        $add->what_will_you_learn_description = json_encode(request('what_will_you_learn_description'));
        $add->save();

        if (!empty(request('course_image'))) {

            $request->course_image->move(public_path('uplaod/courses/coursesimages/'), $course_image_name);
        }
        // if (!empty(request('course_video'))) {

        //     $request->course_video->move(public_path('uplaod/courses/coursesvideos/'), $course_video_name);
        // }

        $select = CoursesFiles::where('course_id', request('id'))->first();

        $add = CoursesFiles::find($select->id);
        $add->video_title = json_encode(request('video_title'));
        $add->video_category = json_encode(request('video_category'));
        $add->video_url = json_encode(request('video_url'));
        $add->save();

        session()->flash('success', 'Successfully updated');

        return back();
    }

    public function approve($id)
    {

        $add = Courses::find($id);
        $add->isActive = 1;
        $add->save();

        return back();
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

    public function destroy($id)
    {

        Courses::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }

}
