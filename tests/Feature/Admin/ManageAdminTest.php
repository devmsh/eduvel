<?php

namespace Tests\Feature\Admin;

use App\Http\Middleware\VerifyCsrfToken;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageAdminTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        Storage::fake();

        $this->withoutMiddleware(VerifyCsrfToken::class);
    }

    public function test_guest_cannot_add_admin()
    {
        $response = $this->post('admin/admins', []);

        $response->assertRedirect('login');
    }

    public function test_admin_must_be_validated()
    {
        $this->actingAs($this->createAdmin());

        $response = $this->post('admin/admins', []);

        $response->assertSessionHasErrors([
            'name',
            'new_email',
            'password',
            'roles',
        ]);
    }

    public function test_admin_can_add_admin()
    {
        $this->actingAs($this->createAdmin());

        $response = $this->post('admin/admins', $this->validAdmin());

        $admin = User::latest()->first();

        $response->assertRedirect('admin/admins');
        $response->assertSessionHas('success');

        $this->assertTrue($admin->confirmed);
        $this->assertEquals($admin->name, 'The Admin');
        $this->assertEquals($admin->email, 'admin@example.com');
//        $this->assertEquals($admin->password, bcrypt('123123'));
        $this->assertTrue($admin->hasRole('Admin'));
    }

    public function test_admin_can_edit_admin()
    {
        $this->markTestSkipped();

        $admin = factory(User::class)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->put('admin/admins/1', $this->validAdmin());

        $admin = admin::latest()->first();

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($admin->image);

        $this->assertTrue($admin->confirmed);
        $this->assertEquals($admin->name, 'The Admin');
        $this->assertEquals($admin->email, 'admin@example.com');
//        $this->assertEquals($admin->password, bcrypt('123123'));
        $this->assertTrue($admin->hasRole('Admin'));
    }

    public function test_admin_can_delete_admin()
    {
        $admin = factory(User::class)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->delete("admin/admins/{$admin->id}");

        $response->assertSessionHas('success');
        $response->assertRedirect();

        $this->assertNull($admin->fresh());
    }

    private function validAdmin()
    {
        return [
            'name' => 'The Admin',
            'new_email' => 'admin@example.com',
            'password' => '123123',
            'roles' => 'Admin',
        ];
    }

    public function test_can_view_list_of_admins()
    {
        factory(User::class, 50)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->get('admin/admins');

        $response->assertSuccessful();

        $response->assertViewHas('admins', function ($admins) {
            $this->assertCount(15, $admins);
            return true;
        });
    }
}


