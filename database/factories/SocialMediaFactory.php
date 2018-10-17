<?php

use Faker\Generator as Faker;

$factory->define(App\SocialMedia::class, function (Faker $faker) {
    return [
       
        'link' => 'https://www.facebook.com/malzard96',
        'icon' => $faker->randomElement([ "ti-facebook", "ti-twitter-alt", "ti-google", 'ti-pinterest', 'ti-instagram' ]),
    ];
});
