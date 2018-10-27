<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouponRequest;
use Illuminate\Http\Request;
use App\Course;
use App\Coupon;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Coupon::class);
    }

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

    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return back()->with('success', 'Successfully Deleted');
    }

    public function approve(Coupon $coupon)
    {
        $coupon->approve();

        return back()->with('success', 'Successfully Approved');
    }
}
