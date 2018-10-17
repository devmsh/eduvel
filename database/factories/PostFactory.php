<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
    	'image' => '1521974049.jpg',
		'title' => $faker->text($maxNbChars = 10),
		'description' => $faker->text($maxNbChars = 255),
		'category_id' => 1,
		'admin_id' => 1,

    ];
});
