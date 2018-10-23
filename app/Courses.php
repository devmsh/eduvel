<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = [];

    protected $casts = [
        'what_will_you_learn_title' => 'array',
        'what_will_you_learn_description' => 'array',
    ];

    public static function createFor($user, $data)
    {
        $data = collect($data);

        $courses = $user->courses()->create($data->except([
            'video_title', 'video_category', 'video_url'
        ])->toArray());

        $courses->courses_file()->create($data->only([
            'video_title', 'video_category', 'video_url'
        ])->toArray());

        return $courses;
    }

    // public function course_category()
    // {
    //     return $this->belongsTo('App\CourseCategory');
    // }

    public function courses_file()
    {
        return $this->hasOne(CoursesFiles::Class, 'course_id');
    }

    public function courses_files()
    {
        return $this->hasMany(CoursesFiles::Class, 'course_id');
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
