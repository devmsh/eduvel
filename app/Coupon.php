<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function scopeActivated($query)
    {
        return $query->where('isActive', 1);
    }

    public function scopeOwnedBy($query,User $user)
    {
        return $query->where('user_id', $user->id);
    }

    public function getRouteKeyName()
    {
        return 'coupon_code';
    }
}
