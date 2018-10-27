<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
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

        $this->courses_file->update($data->only([
            'video_title', 'video_category', 'video_url'
        ])->toArray());

        return $this;
    }

    public function category()
    {
        return $this->belongsTo(CourseCategory::class);
    }

    public function courses_file()
    {
        return $this->hasOne(CoursesFiles::Class);
    }

    public function course_comments()
    {
        return $this->hasMany(CourseComment::Class);
    }

    public function courses_likes()
    {
        return $this->hasMany(User::Class);
    }

    public function approve()
    {
        return $this->update(['isActive' => true]);
    }

    public function scopeOwnedBy($query,User $user)
    {
        return $query->where('user_id', $user->id);
    }

}
