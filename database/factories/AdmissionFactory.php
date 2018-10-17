<?php

use Faker\Generator as Faker;

$factory->define(App\Admission::class, function (Faker $faker) {
     return [
    	'user_uniqid' => '5b154bef024f0',
    	'telephone' => '059 - 7733890',
    	'age' => 22,
        'education_level' => 'Bachelor degree',
        'gender' => 'Male',
        'address' => 'Gaza - palesine', // secret
        'city' => 'Gaza',
        'zipcode' => 840,
        'country'=> 'Asia',
        'preferences'=> '["Management","Art","Litteratture","Math","Architecture"]',
        'messagere_here'=> 'Lorem ipsum dolor sit amet, dicta oportere ad est, ea eos partem neglegentur theophrastus. Esse voluptatum duo ne, expetenda corrumpit no per, at mei nobis lucilius. No eos semper aperiri neglegentur, vis noluisse quaestio no. Vix an nostro inimicus, qui ut animal fabellas reprehendunt. In quando repudiare intellegebat sed, nam suas dicta melius ea.',
        'terms'=> 'yes',
    ];
});
