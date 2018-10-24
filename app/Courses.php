<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $attributes = [
        'isActive' => 0
    ];

    protected $guarded = [];

    protected $casts = [
        'isActive' => 'boolean',
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

    public function updateFor($user, $data)
    {
        $data = collect($data)->put('user_id', $user->id);

        $this->update($data->except([
            'video_title', 'video_category', 'video_url'
        ])->toArray());

        $this->courses_file()->create($data->only([
            'video_title', 'video_category', 'video_url'
        ])->toArray());

        return $this;
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
