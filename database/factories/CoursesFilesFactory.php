<?php

use Faker\Generator as Faker;

$factory->define(App\CoursesFiles::class, function (Faker $faker) {
    return [
        'video_title' => [],
        'video_category' => [],
        'video_url' => [],
        'course_id' => function(){
            return factory(\App\Course::class)->create()->id;
        }
    ];
});
