<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function createAdmin()
    {
        $admin = factory(User::class)->create();

        $admin->roles()->attach(1);

        return $admin;
    }
}
