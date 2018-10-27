<?php

namespace Tests\Feature;

use App\Coupon;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ManageCouponTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        $this->withoutMiddleware(VerifyCsrfToken::class);
    }

    public function test_admin_can_view_all_coupons()
    {
        factory(Coupon::class, 5)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->get('admin/coupons');

        $response->assertSuccessful();

        $response->assertViewHas('coupons', function ($coupons) {
            $this->assertCount(5, $coupons);
            return true;
        });
    }

    public function test_teacher_can_view_own_active_coupons()
    {
        $this->withoutExceptionHandling();

        $teacher = $this->createTeacher();

        $courses = factory(Coupon::class, 5)->create([
            'user_id' => $teacher->id,
            'isActive' => 1
        ]);

        $courses->first()->delete();

        factory(Coupon::class, 5)->create([
            'user_id' => $teacher->id,
            'isActive' => 0
        ]);

        factory(Coupon::class, 5)->create([
            'isActive' => 1
        ]);

        $this->actingAs($teacher);

        $response = $this->get('dashboard/coupons');

        $response->assertSuccessful();

        $response->assertViewHas('coupons', function ($coupons) {
            $this->assertCount(4, $coupons);
            return true;
        });
    }
}
