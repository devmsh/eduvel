<?php

use Faker\Generator as Faker;

$factory->define(\App\Coupon::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'course_id' => function(){
            return factory(\App\User::class)->create()->id;
        },
        'coupon_code_discount_price' => $faker->randomNumber(2)
    ];
});
