<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use App\Course;
use App\Coupon;

class CouponController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // TODO: to be removed, currently used in coupon creation form
        $courses = Course::when($user->hasRole('Teacher'), function ($query) {
            $query->ownedBy(auth()->user());
        })->get();

        $coupons = Coupon::when($user->hasRole('Teacher'), function ($query) {
            $query->activated()->ownedBy(auth()->user());
        })->with('course')->get();

        $view = $user->hasRole('Teacher') ? 'teacher.courses.coupon' : 'admin.courses.coupon';
        return view($view, compact('courses', 'coupons'));
    }

    public function store(CouponRequest $request)
    {
        if (auth()->user()->hasAnyRole(['Admin', 'Editor'])) {
            Coupon::create($this->validInputs($request, [
                'admin_id' => auth()->user()->id,
                'user_id' => auth()->user()->id,
                'coupon_code' => str_random(8),
                'isActive' => 1,
            ]));
        } else {
            Coupon::create($this->validInputs($request, [
                'user_id' => auth()->user()->id,
                'coupon_code' => str_random(8),
            ]));
        }

        return back()->with('success', 'Your request has been successfully sent please wait for activation');
    }

    public function destroy($coupon_code)
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
