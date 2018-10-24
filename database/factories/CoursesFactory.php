<?php

use Faker\Generator as Faker;

$factory->define(App\Courses::class, function (Faker $faker) {
    return [
        'user_id' => '1',
        'course_title' => 'Persius delenit has cu',
        'teacher_name' => 'Teacher name',
        'course_start' => '2018-07-07',
        'course_expire' => '2018-08-08',
        'course_price' => 50,
        'course_discount_price' => 50,
        'course_image' => 'course__list_6.jpg',
        'course_video' => 'course__list_6.jpg',
        'course_description' => 'Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.',
        'category_id' => function () {
            return factory(\App\CourseCategory::class)->create()->id;
        },
        'coupon_code' => 'coupon code',
        'coupon_code_discount_price' => '50',
        'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
        'course_time' => '1h 30min',
        'what_will_you_learn_title' => [],
        'what_will_you_learn_description' => [],
    ];
});
