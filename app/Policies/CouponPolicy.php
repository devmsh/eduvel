<?php

namespace App\Policies;

use App\User;
use App\Coupon;
use Illuminate\Auth\Access\HandlesAuthorization;

class CouponPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->hasAnyRole(['Admin', 'Editor'])) {
            return true;
        }
    }

    public function create(User $user)
    {
        return $user->courses()->where('id', request('course_id'))->exists();
    }

    public function delete(User $user, Coupon $coupon)
    {
        return $coupon->user_id == $user->id;
    }
}
