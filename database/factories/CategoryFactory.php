<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [

        'name' => 'News',
        'description' => $faker->text($maxNbChars = 25),
    ];
});
