<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    // public function course_category()
    // {
    //     return $this->belongsTo('App\CourseCategory');
    // }

    public function courses_files()
    {
    	return $this->hasMany(CoursesFiles::Class);
    }

    public function course_comments()
    {
        return $this->hasMany(CourseComment::Class);
    }

    public function courses_likes()
    {
        return $this->hasMany(User::Class);
    }


}
