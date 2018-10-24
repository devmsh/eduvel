<?php

namespace Tests;

use App\Role;
use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp()
    {
        parent::setUp();

        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Editor']);
        Role::create(['name' => 'Teacher']);
    }

    public function createAdmin()
    {
        $admin = factory(User::class)->create();

        $admin->roles()->attach($this->getRoleId('Admin'));

        return $admin;
    }

    public function createEditor()
    {
        $editor = factory(User::class)->create();

        $editor->roles()->attach($this->getRoleId('Editor'));

        return $editor;
    }


    public function createTeacher()
    {
        $teacher = factory(User::class)->create();

        $teacher->roles()->attach($this->getRoleId('Teacher'));

        return $teacher;
    }

    public function getRoleId($role)
    {
        return Role::where('name', $role)->first()->id;
    }
}
