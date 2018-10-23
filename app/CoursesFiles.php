<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoursesFiles extends Model
{
    public function courses()
    {
        return $this->belongsTo(Courses::Class);
    }
}
