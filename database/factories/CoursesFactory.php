<?php

use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'course_title' => $faker->title,
        'teacher_name' => $faker->name,
        'course_start' => $faker->date(),
        'course_expire' => $faker->date(),
        'course_price' => $faker->randomNumber(),
        'course_discount_price' => $faker->randomNumber(),
        'course_image' => 'course__list_6.jpg',
        'course_video' => 'course__list_6.jpg',
        'course_description' => $faker->sentence,
        'category_id' => function () {
            return factory(\App\CourseCategory::class)->create()->id;
        },
        'whats_includes' => $faker->sentence,
        'course_time' => '1h 30min',
        'what_will_you_learn_title' => [],
        'what_will_you_learn_description' => [],
    ];
});
