<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create();
        App\User::create([
            'uniqid' => '5b154bef024f0',
            'type_user' => 'Teacher',
            'image' => 'user-image.png',
            'name' => 'Name Teacher',
            'email' => 'tt@tt.tt',
            'password' => bcrypt(123123), // secret
            'remember_token' => str_random(10),
            'confirmed' => 1,
        ]);

        App\User::create([
            'uniqid' => '5b154bef02400',
            'type_user' => 'Student',
            'image' => 'user-image.png',
            'name' => 'Name Student',
            'email' => 'ss@ss.ss',
            'password' => bcrypt(123123), // secret
            'remember_token' => str_random(10),
            'confirmed' => 1,
        ]);
    }
}
