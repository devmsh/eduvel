<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseLike extends Model
{
    public function course()
    {
    	return $this->belongsTo(Courses::Class);
    }

    public function user()
    {
    	return $this->belongsTo(User::Class);
    }
}
