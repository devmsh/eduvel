<?php

use Faker\Generator as Faker;

$factory->define(App\Faq::class, function (Faker $faker) {
    return [

        'title' => $faker->text($maxNbChars = 25),
		'content' => $faker->text($maxNbChars = 255),
		'category_faq' => $faker->randomElement(["Payments","Suggestions","Reccomendations","Terms&conditons", "Booking"]),
    ];
});
