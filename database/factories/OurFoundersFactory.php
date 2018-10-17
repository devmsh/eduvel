<?php

use Faker\Generator as Faker;

$factory->define(App\OurFounders::class, function (Faker $faker) {
    return [
        'image' => '1521792915.jpg',
        'name' => $faker->text($maxNbChars = 20),
        'job' => $faker->text($maxNbChars = 15),
    ];
});
