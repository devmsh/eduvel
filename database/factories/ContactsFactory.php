<?php

use Faker\Generator as Faker;

$factory->define(App\Contacts::class, function (Faker $faker) {
    return [
        
        'name_contact' => 'Mohammed ',
		'lastname_contact' => 'Alzard',
		'email_contact' => 'm4ten.3@gmail.com',
		'phone_contact' => '0597733890',
		'done_read' => 0,
		'message_contact' => $faker->text($maxNbChars = 255),
    ];
});
