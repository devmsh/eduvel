<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    protected $casts = [
        'confirmed' => 'boolean',
    ];

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orders($value = '')
    {
        return $this->hasMany('App\Order');
    }

    public function courses()
    {
        return $this->hasMany(Course::Class);
    }

    public function courses_likes()
    {
        return $this->hasMany(User::Class);
    }

    public function can($ability, $arguments = [])
    {
        return $this->hasRole('Admin') ?
            true :
            parent::can($ability, $arguments);
    }
}
