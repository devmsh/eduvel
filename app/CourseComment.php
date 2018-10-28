<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    public function course()
    {
        return $this->belongsTo(Course::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
