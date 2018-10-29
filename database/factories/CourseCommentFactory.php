<?php

use Faker\Generator as Faker;

$factory->define(\App\CourseComment::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'course_id' => function(){
            return factory(\App\Course::class)->create()->id;
        },
        'star_number' => $faker->numberBetween(1,5),
        'comment' => $faker->sentence,
    ];
});
