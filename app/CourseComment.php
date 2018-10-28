<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseComment extends Model
{
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::Class);
    }

    public function user()
    {
        return $this->belongsTo(User::Class);
    }

    public function read()
    {
        return $this->update([
            'dane_read' => 1
        ]);
    }
}
