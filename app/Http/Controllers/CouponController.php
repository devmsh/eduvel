<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\Coupon;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $courses = Course::when($user->hasRole('Teacher'), function ($query) {
            $query->ownedBy(auth()->user());
        })->get();

        $coupons = Coupon::when($user->hasRole('Teacher'), function ($query) {
            $query->activated()->ownedBy(auth()->user());
        })->get();

        $view = $user->hasRole('Teacher') ? 'teacher.courses.coupon' : 'admin.courses.coupon';
        return view($view, compact('courses', 'coupons'));
    }

    public function create(Request $request)
    {

        $request->validate([
            'course_id' => 'required',
            'coupon_code_discount_price' => 'required',
        ]);

        $course = Course::where('id', request('course_id'))->first();

        if ($course->user_id == auth()->user()->id) {

            $coupon = new Coupon();
            $coupon->user_id = auth()->user()->id;
            $coupon->course_id = request('course_id');
            $coupon->coupon_code = str_random(8);
            $coupon->coupon_code_discount_price = request('coupon_code_discount_price');
            $coupon->start_date = request('start_date');
            $coupon->end_date = request('end_date');
            $coupon->number_of_students = request('number_of_students');
            $coupon->save();

        } elseif (auth()->user()->type_user = 'Admin' || auth()->user()->type_user = 'Editor') {

            $coupon = new Coupon();
            $coupon->admin_id = auth()->user()->id;
            $coupon->user_id = auth()->user()->id;
            $coupon->course_id = request('course_id');
            $coupon->coupon_code = str_random(8);
            $coupon->coupon_code_discount_price = request('coupon_code_discount_price');
            $coupon->start_date = request('start_date');
            $coupon->end_date = request('end_date');
            $coupon->number_of_students = request('number_of_students');
            $coupon->isActive = 1;
            $coupon->save();
        }

        session()->flash('success', 'Your request has been successfully sent please wait for activation');
        return back();
    }

    public function delete($coupon_code)
    {
        if (auth()->user()->type_user == 'Admin' || auth()->user()->type_user == 'Editor') {
            $coupon = Coupon::where('coupon_code', $coupon_code)->first();
            $coupon = Coupon::find($coupon->id);
            $coupon->deleted_at = date('Y-m-d');
            $coupon->save();
        } elseif (auth()->user()->type_user == 'Teacher') {

            $coupon = Coupon::where('coupon_code', $coupon_code)->where('user_id', auth()->user()->id)->first();
            $coupon = Coupon::find($coupon->id);
            $coupon->deleted_at = date('Y-m-d');
            $coupon->save();
        }

        session()->flash('success', 'Successfully Deleted');
        // $coupon->delete();
        return back();
    }

    public function approve($id)
    {
        $coupon = Coupon::find($id);
        $coupon->isActive = 1;
        $coupon->save();
        session()->flash('success', 'Successfully Approved');
        return back();
    }
}
