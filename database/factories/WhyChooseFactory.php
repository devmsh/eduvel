<?php

use Faker\Generator as Faker;

$factory->define(App\whychoose::class, function (Faker $faker) {
    return [
        'icon' => $faker->randomElement([
            "pe-7s-diamond",
            "pe-7s-display2",
            "pe-7s-science",
            "pe-7s-rocket",
            "pe-7s-target",
            "pe-7s-graph1"
        ]),
        'title' => $faker->text($maxNbChars = 20),
        'description' => $faker->text($maxNbChars = 191),
    ];
});
