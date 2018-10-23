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
use LRedis;

class DashboardController extends Controller
{
    public function index()
    {
        $countCourses = Courses::where('isActive', 0)->count();
        $countCourseCategory = CourseCategory::get()->count();
        $countMessages = Contacts::where('done_read', 0)->count();
        $countnewsletter = Newsletter::get()->count();

        return view('admin.home', compact('countCourses', 'countCourseCategory', 'countMessages', 'countnewsletter'));
    }

    public function get_message()
    {

        // $q = Contacts::OrderBy('id', 'desc')->first(); 
        // // return $q;
        // $redis = LRedis::connection();
        // $redis->publish('message',json_encode($q));

        $contacts = Contacts::OrderBy('id', 'desc')->where('done_read', 0)->paginate(5);
        return $contacts;
    }

    public function get_message_id($id)
    {
        $contact = Contacts::find($id);
        $contact->done_read = 1;
        $contact->save();

        return $contact;
    }
}
