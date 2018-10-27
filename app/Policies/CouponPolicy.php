<?php

namespace App\Policies;

use App\User;
use App\Coupon;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return $user->hasAnyRole(['Admin','Editor'])
            || $user->courses()->where('id',request('course_id'))->exists();
    }

    public function delete(User $user, Coupon $coupon)
    {
        return $user->hasAnyRole(['Admin', 'Editor'])
            || $coupon->user_id == $user->id;
    }
}
