<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    public function post()
    {
        return $this->belongsTo(Post::Class);
    }
}
