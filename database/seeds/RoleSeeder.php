<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin',]);
        Role::create(['name' => 'Editor',]);
        Role::create(['name' => 'User',]);
        Role::create(['name' => 'Teacher',]);
        Role::create(['name' => 'Student',]);

    }
}
