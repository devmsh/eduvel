<?php

use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\UserRole::create(['user_id' => 1, 'role_id' => 1]);
        App\UserRole::create(['user_id' => 2, 'role_id' => 4]);
        App\UserRole::create(['user_id' => 3, 'role_id' => 5]);
    }
}
