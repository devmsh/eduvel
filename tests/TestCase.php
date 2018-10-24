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

    public function getRoleId($role)
    {
        return Role::where('name', $role)->first()->id;
    }
}
