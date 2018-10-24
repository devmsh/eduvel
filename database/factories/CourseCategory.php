<?php

use Faker\Generator as Faker;

$factory->define(\App\CourseCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'image' => 'default.jpg'
    ];
});
