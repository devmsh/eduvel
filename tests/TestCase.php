<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Spatie\Permission\Models\Role;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Teacher']);
    }

    public function createAdmin()
    {
        $admin = factory(User::class)->create();

        $admin->assignRole('Admin');

        return $admin;
    }

    public function createTeacher($permissions = [])
    {
        $user = factory(User::class)->create();

        $user->assignRole('Teacher');

        $user->givePermissionTo($permissions);

        return $user;
    }
}
