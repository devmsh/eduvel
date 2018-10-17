<?php

use Faker\Generator as Faker;

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
    	'uniqid' => uniqid(),
    	'type_user' => 'Admin',
        'name' => 'Mohammed A. Alzard',
        'email' => 'mm@mm.mm',
        'password' => bcrypt(123123), // secret
        'remember_token' => str_random(10),
        'created_at'=> $faker->dateTime()
    ];
});
