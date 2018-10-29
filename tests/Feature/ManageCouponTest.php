<?php

namespace Tests\Feature;

use App\Coupon;
use App\Course;
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
        $teacher = $this->createUser();

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

    public function test_admin_can_add_coupon()
    {
        $course = factory(Course::class)->create();

        $this->actingAs($admin = $this->createAdmin());

        $response = $this->post('admin/coupons', [
            'course_id' => $course->id,
            'coupon_code_discount_price' => 10
        ]);

        $coupon = Coupon::find(1);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertEquals(1, $coupon->isActive);
        $this->assertEquals($course->id, $coupon->course_id);
        $this->assertEquals(10, $coupon->coupon_code_discount_price);
        $this->assertEquals($admin->id, $coupon->user_id);
        $this->assertEquals($admin->id, $coupon->admin_id);
    }

    public function test_teacher_can_add_coupon()
    {
        $teacher = $this->createUser();

        $course = factory(Course::class)->create([
            'user_id' => $teacher
        ]);

        $this->actingAs($teacher);

        $response = $this->post('dashboard/coupons', [
            'course_id' => $course->id,
            'coupon_code_discount_price' => 10
        ]);

        $coupon = Coupon::find(1);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertEquals(0, $coupon->isActive);
        $this->assertEquals($course->id, $coupon->course_id);
        $this->assertEquals(10, $coupon->coupon_code_discount_price);
        $this->assertEquals($teacher->id, $coupon->user_id);
        $this->assertNull($coupon->admin_id);
    }

    public function test_admin_can_delete_coupon()
    {
        $coupon = factory(Coupon::class)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->delete('admin/coupons/' . $coupon->coupon_code);

        $response->assertRedirect();

        $this->assertNotNull($coupon->fresh()->deleted_at);
    }

    public function test_teacher_can_delete_owned_coupon()
    {
        $teacher = $this->createUser();

        $coupon = factory(Coupon::class)->create([
            'user_id' => $teacher->id
        ]);

        $this->actingAs($teacher);

        $response = $this->delete('dashboard/coupons/' . $coupon->coupon_code);

        $response->assertRedirect();

        $this->assertNotNull($coupon->fresh()->deleted_at);
    }

    public function test_teacher_cannot_delete_other_coupon()
    {
        $coupon = factory(Coupon::class)->create();

        $this->actingAs($this->createUser());

        $response = $this->delete('dashboard/coupons/' . $coupon->coupon_code);

        $response->assertStatus(403);

        $this->assertNull($coupon->fresh()->deleted_at);
    }
}
