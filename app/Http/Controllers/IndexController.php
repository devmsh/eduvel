<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\SocialMedia;
use App\whychoose;
use App\OurFounders;
use App\Contacts;
use App\Category;
use App\Post;
use App\BlogComment;
use App\Faq;
use App\MediaGallery;
use App\CourseCategory;
use App\Courses;
use App\Newsletter;
use App\CourseComment;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Admission;
use App\CourseFiles;
use App\Helpers\EducationAlzardHelpers;
use LRedis;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $categories = Category::get();
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        $course_categorys = CourseCategory::get();
        $courses = Courses::orderBy('id', 'desc')->where('isActive', 1)->paginate(6);

        $countCourses = Courses::where('isActive', 1)->count();

        return view('index', compact('settings', 'socialMedia', 'categories', 'posts', 'course_categorys', 'courses', 'countCourses'));
    }

    public function contacts()
    {
        $x = rand(5, 20);
        $y = rand(5, 20);

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();

        return view('contacts', compact('x', 'y', 'socialMedia', 'settings'));
    }

    public function contacts_store(Request $request)
    {

        $contacts = $this->validate(request(), [

            'name_contact' => 'required',
            'lastname_contact' => 'required',
            'email_contact' => 'required|email',
            'phone_contact' => 'required',
            'verify_contact' => 'required',
            'message_contact' => 'required|min:10',
        ]);

        $z = request('verify_contact');
        $sum = request('x') + request('y');

        // if($z != $sum)
        // {
        //     /*session()->flash('verify_contact', 'Please confirm the sum of the two numbers');
        //     return back();*/
        //     $message = array(
        //         "status"    => 423,
        //         "message"   => "Email already exists",
        //         "errors"    =>[ "Email already exists" ]
        //     );
        //     return response()->json($message, 423);
        // }

        $add = new Contacts;
        $add->name_contact = request('name_contact');
        $add->lastname_contact = request('lastname_contact');
        $add->email_contact = request('email_contact');
        $add->phone_contact = request('phone_contact');
        $add->message_contact = request('message_contact');
        $add->done_read = 0;
        $add->save();

        // For Add To Server redis -- For Notifications
        $q = Contacts::OrderBy('id', 'desc')->first();
        // return $q;
        $redis = LRedis::connection();
        $redis->publish('message', json_encode($q));

        // session()->flash('success', 'Send Successfully');
        // return back();

        echo "success";
        $notification = array(
            'status' => 200,
            'message' => 'Your message was sent successfully',
            'alert-type' => 'success'
        );
        return "success";

    }

    public function about()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $whychooses = whychoose::get();
        $ourFounders = OurFounders::get();
        return view('about', compact('settings', 'socialMedia', 'ourFounders', 'whychooses'));
    }

    public function blog()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        $categories = Category::get();
        return view('blog', compact('settings', 'socialMedia', 'posts', 'categories'));
    }

    public function blog_post(Post $id)
    {

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $posts = Post::orderBy('id', 'desc')->paginate(4);
        $categories = Category::get();
        $post = Post::where('id', $id->id)->first();

        if (empty($id) || !is_numeric($id->id) || empty($post)) {
            return view('errors.404');
        }

        return view('blog_post', compact('settings', 'socialMedia', 'posts', 'categories', 'post', 'id'));
    }

    public function filter_catecory($id)
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        // $categories = Category::get();

        $categories = Category::get();
        $posts = Post::where('category_id', $id)->paginate(4);
        $category = Category::where('id', $id)->first();

        if (empty($id) || !is_numeric($id) || empty($category)) {
            return view('errors.404');
        }

        return view('blog', compact('settings', 'socialMedia', 'posts', 'categories', 'id'));
    }

    public function blog_comments_store(Request $request)
    {
        $blog_comments_store = $this->validate(request(), [

            'post_id' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'comment' => 'required',
        ]);

        $add = new BlogComment;
        $add->post_id = request('post_id');
        $add->name = request('name');
        $add->email = request('email');
        $add->website = request('website');
        $add->comment = request('comment');
        if (!empty(request('reply_id'))) {
            $add->reply_id = request('reply_id');
        }
        $add->save();

        session()->flash('success', 'Send Successfully');
        return back();
    }

    public function search(Request $request)
    {
        $value = $request->search;

        $collection = collect([$request->search]);

        $multiplied = $collection->map(function ($item, $key) {
            $search = Post::where('title', 'like', '%' . $item . '%')
                ->orWhere('image', 'LIKE', '%' . $item . '%')
                ->orWhere('title', 'LIKE', '%' . $item . '%')
                ->orWhere('description', 'LIKE', '%' . $item . '%')
                ->orWhere('category_id', 'LIKE', '%' . $item . '%')
                ->orWhere('admin_id', 'LIKE', '%' . $item . '%')
                ->get();

            if ($search !== null) {
                return $search;
            }
        });

        if ($multiplied->all() !== null) {
            $settings = Settings::get()->find(1);
            $socialMedia = SocialMedia::get();
            $posts = Post::orderBy('id', 'desc')->paginate(4);
            $categories = Category::get();
            $data = $multiplied->all();
            // return $data[0];
            return view('blog', compact('settings', 'socialMedia', 'categories', 'data', 'value'));
        }

        return 'Not Found';
    }

    public function faqs()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $faqs = Faq::get();

        return view('faqs', compact('settings', 'socialMedia', 'faqs'));
    }

    public function help()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();

        return view('help', compact('settings', 'socialMedia'));
    }

    public function media_gallery()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();

        $mediaGallery = MediaGallery::get();

        return view('media-gallery', compact('settings', 'socialMedia', 'mediaGallery'));
    }

    public function all_courses()
    {

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $course_categorys = CourseCategory::get();
        $courses = Courses::where('isActive', 1)->orderBy('id', 'desc')->get();
        return view('all-courses', compact('courses', 'course_categorys', 'settings', 'socialMedia'));
    }

    public function all_courses_list()
    {

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $course_categorys = CourseCategory::get();
        $courses = Courses::where('isActive', 1)->orderBy('id', 'desc')->get();
        return view('all-courses-list', compact('courses', 'course_categorys', 'settings', 'socialMedia'));
    }

    public function searsh_category($courses_category)
    {

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();

        $courses_category = CourseCategory::select(array('id', 'name'))
            ->orWhere('name', 'LIKE', '%' . $courses_category . '%')
            ->first();

        $course_categorys = CourseCategory::get();
        $courses = Courses::where('category_id', $courses_category->id)->where('isActive', 1)->paginate(3);

        return view('all-courses', compact('course_categorys', 'courses', 'settings', 'socialMedia'));
    }

    public function course_details($course_title)
    {

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $course_categorys = CourseCategory::get();

        $course_details = Courses::where('course_title', $course_title)->first();
        $teacher_detail = User::where('id', $course_details->user_id)->first();

        $get_comments = CourseComment::where('course_id', $course_details->id)->get();
        // return $comments;

        $user_id = CourseComment::select('user_id')->where('course_id', $course_details->id)->get()->toarray();
        $comment = [];
        $length_users = count($user_id);
        // return $user_id;
        for ($i = 0; $i < $length_users; $i++) {

            $comment[$i] = User::where('id', $user_id[$i]['user_id'])->first();
        }

        $comments = (array_map(null, $get_comments->toArray(), $comment));

        $countReviews = 0;
        foreach ($get_comments as $get_comment) {

            $countReviews = $countReviews + $get_comment->star_number;
        }
        if ($countReviews == 0) {
            $x = 0;
        } else {
            $x = $countReviews / count($get_comments);
        }
        // return $x;
        $countReviews = $x;
        $totalReviews = count($get_comments);
        $reviews5 = CourseComment::where('star_number', 5)->where('course_id', $course_details->id)->count();
        $reviews4 = CourseComment::where('star_number', 4)->where('course_id', $course_details->id)->count();
        $reviews3 = CourseComment::where('star_number', 3)->where('course_id', $course_details->id)->count();
        $reviews2 = CourseComment::where('star_number', 2)->where('course_id', $course_details->id)->count();
        $reviews1 = CourseComment::where('star_number', 1)->where('course_id', $course_details->id)->count();

        // return ($reviews4 / count($get_comments))*100;

        $reviews = collect([
            'countReviews' => $countReviews,
            'totalReviews' => $totalReviews,
            'reviews5' => $reviews5,
            'reviews4' => $reviews4,
            'reviews3' => $reviews3,
            'reviews2' => $reviews2,
            'reviews1' => $reviews1,
        ]);

        if (Auth::check()) {
            $orders = Auth::user()->orders;
            $orders->transform(function ($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;
            });

            /*foreach($orders as $order){
                foreach($order->cart->items as $item){
                    if($item['item']['id'] == $course_details->id){
                        $yes = 'Yes';
                    }
                }
            }
            $yes = 'No';*/
            $userAuth = User::where('id', auth()->user()->id)->first();
        }

        // if (empty($orders[0])) {
        //     return 'empty';
        // }else{
        //     return $orders[0];
        // }

        $courseFiles = CourseFiles::where('course_id', $course_details->id)->where('isActive', 1)->get();

        return view('course-details', compact('course_categorys', 'course_details', 'comments', 'reviews', 'settings', 'socialMedia', 'orders', 'yes', 'userAuth', 'teacher_detail', 'courseFiles'));
    }

    public function course_comments_store(Request $request)
    {

        $course_comments_store = $this->validate(request(), [

            'course_id' => 'required',
            'star_number' => 'required',
            'comment' => 'required',
        ]);

        $add = new CourseComment;
        $add->user_id = auth()->user()->id;
        $add->course_id = request('course_id');
        $add->star_number = request('star_number');
        $add->comment = request('comment');
        if (!empty(request('reply_id'))) {
            $add->reply_id = request('reply_id');
        }
        $add->dane_read = 0;
        $add->save();

        session()->flash('success', 'Send Successfully');
        return back();
    }

    public function teacher_detail(Request $request, $name)
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();

        $teacher_detail = User::where('id', $request->id)->first();
        $admission = Admission::where('user_uniqid', $teacher_detail->uniqid)->first();
        $myCourses = Courses::where('user_id', $request->id)->get();
        $countMyCourses = Courses::where('user_id', $request->id)->count();
        $course_categorys = CourseCategory::get();

        return view('teacher-detail', compact('settings', 'socialMedia', 'teacher_detail', 'admission', 'myCourses', 'course_categorys', 'countMyCourses'));

    }

    public function newsletter_form(Request $request)
    {

        $contacts = $this->validate(request(), [

            'email_newsletter' => 'required|email',
        ]);
        $add = new Newsletter;
        $add->email = request('email_newsletter');
        $add->save();

        echo "success";
        $notification = array(
            'status' => 200,
            'message' => 'Your email was sent successfully',
            'alert-type' => 'success'
        );
        return "success";
    }

    public function searsh(Request $request)
    {

        if (!preg_match('/^[a-zA-Z ]*$/', $request->search)) {
            return redirect('/courses-list');
        }
        $courses = Courses::select('courses.*')
            ->orWhere('user_id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('teacher_name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_start', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_expire', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_price', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_discount_price', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_image', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_video', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_description', 'LIKE', '%' . $request->search . '%')
            ->orWhere('category_id', 'LIKE', '%' . $request->search . '%')
            ->orWhere('coupon_code', 'LIKE', '%' . $request->search . '%')
            ->orWhere('coupon_code_discount_price', 'LIKE', '%' . $request->search . '%')
            ->orWhere('whats_includes', 'LIKE', '%' . $request->search . '%')
            ->orWhere('isActive', 'LIKE', '%' . $request->search . '%')
            ->orWhere('course_time', 'LIKE', '%' . $request->search . '%')
            ->orWhere('what_will_you_learn_title', 'LIKE', '%' . $request->search . '%')
            ->orWhere('what_will_you_learn_description', 'LIKE', '%' . $request->search . '%')
            ->where('isActive', 1)->orderBy('updated_at', 'desc')
            ->get();
        if (empty($courses[0])) {

            return redirect('/courses-list');
        }

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $course_categorys = CourseCategory::get();

        return view('all-courses', compact('course_categorys', 'courses', 'settings', 'socialMedia'));
    }

}
