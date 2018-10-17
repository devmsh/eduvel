<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //

    public function categotey()
    {
    	return $this->belongsTo(Category::Class);
    }

    public function blog_comments()
    {
    	return $this->hasMany(BlogComment::Class);
    }
}
