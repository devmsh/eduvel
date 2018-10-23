<?php

use Faker\Generator as Faker;

$factory->define(App\BlogComment::class, function (Faker $faker) {
    return [

        'post_id' => 1,
        'name' => 'Mohammed Alzard',
        'email' => 'm4ten.3@gmail.com',
        'website' => 'www.google.com',
        'comment' => $faker->text($maxNbChars = 255),
    ];
});
