<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseCategory extends Model
{
    protected $guarded = [];

    public function courses()
    {
        return $this->hasMany('App\Course', 'category_id', 'id');
    }
}
