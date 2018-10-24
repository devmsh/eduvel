<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesFiles extends Model
{
    protected $guarded = [];

    protected $casts = [
        'video_title' => 'array',
        'video_category' => 'array',
        'video_url' => 'array',
    ];

    public function course()
    {
        return $this->belongsTo(Course::Class);
    }
}
