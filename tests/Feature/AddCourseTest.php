<?php

namespace Tests\Feature;

use App\CourseCategory;
use App\Courses;
use App\CoursesFiles;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AddCourseTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();

        Storage::fake();

        $this->withoutMiddleware(VerifyCsrfToken::class);
    }

    public function test_guest_cannot_add_course()
    {
        $response = $this->post('admin/courses/store', []);

        $response->assertRedirect('login');
    }

    public function test_course_must_be_validated()
    {
        $this->actingAs($this->createAdmin());

        $response = $this->post('admin/courses/store', []);

        $response->assertSessionHasErrors([
            'course_title',
            'teacher_name',
            'course_start',
            'course_price',
            'course_image',
            'course_video',
            'course_description',
            'category_id',
            'course_time',
            'what_will_you_learn_title',
            'what_will_you_learn_description',
            'video_title',
            'video_category',
            'video_url'
        ]);
    }

    public function test_admin_can_add_course()
    {
        $category = factory(CourseCategory::class)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->post('admin/courses/store', $this->validCourse($category));

        $course = Courses::latest()->first();

        $response->assertRedirect('admin/courses');
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($course->course_image);

        $this->assertFalse($course->isActive);
        $this->assertEquals($course->course_title, 'Persius delenit has cu');
        $this->assertEquals($course->teacher_name, 'Teacher name');
        $this->assertEquals($course->course_start, '2018-07-07');
        $this->assertEquals($course->course_price, 150);
        $this->assertEquals($course->course_video, 'https://www.youtube.com/watch?v=LDgd_gUcqCw');
        $this->assertEquals($course->course_description, 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.');
        $this->assertEquals($course->category_id, $category->id);
        $this->assertEquals($course->course_time, '1h 30min');
        $this->assertEquals($course->what_will_you_learn_title, ["Suas summo id sed erat erant oporteat", "Illud singulis indoctum ad sed", "Alterum bonorum mentitum an mel"]);
        $this->assertEquals($course->what_will_you_learn_description, ["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]);

        $this->assertEquals($course->courses_file->video_title, ["Health Science", "Health and Social Care", "Health Science", "Health and Social Care"]);
        $this->assertEquals($course->courses_file->video_category, ["Introdocution", "Generative Modeling Review", "Variational Autoencoders", "Gaussian Mixture Model Review"]);
        $this->assertEquals($course->courses_file->video_url, ["https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw"]);
    }

    public function test_editor_can_add_course()
    {
        $category = factory(CourseCategory::class)->create();

        $this->actingAs($this->createEditor());

        $response = $this->post('admin/courses/store', $this->validCourse($category));

        $course = Courses::latest()->first();

        $response->assertRedirect('admin/courses');
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($course->course_image);

        $this->assertFalse($course->isActive);
        $this->assertEquals($course->course_title, 'Persius delenit has cu');
        $this->assertEquals($course->teacher_name, 'Teacher name');
        $this->assertEquals($course->course_start, '2018-07-07');
        $this->assertEquals($course->course_price, 150);
        $this->assertEquals($course->course_video, 'https://www.youtube.com/watch?v=LDgd_gUcqCw');
        $this->assertEquals($course->course_description, 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.');
        $this->assertEquals($course->category_id, $category->id);
        $this->assertEquals($course->course_time, '1h 30min');
        $this->assertEquals($course->what_will_you_learn_title, ["Suas summo id sed erat erant oporteat", "Illud singulis indoctum ad sed", "Alterum bonorum mentitum an mel"]);
        $this->assertEquals($course->what_will_you_learn_description, ["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]);

        $this->assertEquals($course->courses_file->video_title, ["Health Science", "Health and Social Care", "Health Science", "Health and Social Care"]);
        $this->assertEquals($course->courses_file->video_category, ["Introdocution", "Generative Modeling Review", "Variational Autoencoders", "Gaussian Mixture Model Review"]);
        $this->assertEquals($course->courses_file->video_url, ["https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw"]);
    }

    public function test_teacher_can_add_course()
    {
        $category = factory(CourseCategory::class)->create();

        $this->actingAs($this->createTeacher());

        $response = $this->post('dashboard/courses/store', $this->validCourse($category));

        $course = Courses::latest()->first();

        $response->assertRedirect('dashboard/courses');
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($course->course_image);

        $this->assertFalse($course->isActive);
        $this->assertEquals($course->course_title, 'Persius delenit has cu');
        $this->assertEquals($course->teacher_name, 'Teacher name');
        $this->assertEquals($course->course_start, '2018-07-07');
        $this->assertEquals($course->course_price, 150);
        $this->assertEquals($course->course_video, 'https://www.youtube.com/watch?v=LDgd_gUcqCw');
        $this->assertEquals($course->course_description, 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.');
        $this->assertEquals($course->category_id, $category->id);
        $this->assertEquals($course->course_time, '1h 30min');
        $this->assertEquals($course->what_will_you_learn_title, ["Suas summo id sed erat erant oporteat", "Illud singulis indoctum ad sed", "Alterum bonorum mentitum an mel"]);
        $this->assertEquals($course->what_will_you_learn_description, ["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]);

        $this->assertEquals($course->courses_file->video_title, ["Health Science", "Health and Social Care", "Health Science", "Health and Social Care"]);
        $this->assertEquals($course->courses_file->video_category, ["Introdocution", "Generative Modeling Review", "Variational Autoencoders", "Gaussian Mixture Model Review"]);
        $this->assertEquals($course->courses_file->video_url, ["https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw"]);
    }

    public function test_can_add_course_with_extra_fields()
    {
        $category = factory(CourseCategory::class)->create();

        $this->actingAs($this->createAdmin());

        $response = $this->post('admin/courses/store', array_merge(
            $this->validCourse($category), [
            'isActive' => 1,
            'course_expire' => '2018-08-08',
            'course_discount_price' => 50,
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
        ]));

        $course = Courses::latest()->first();

        $response->assertRedirect('admin/courses');
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($course->course_image);

        $this->assertTrue($course->isActive);
        $this->assertEquals($course->course_expire, '2018-08-08');
        $this->assertEquals($course->course_discount_price, 50);
        $this->assertEquals($course->coupon_code, 'coupon code');
        $this->assertEquals($course->coupon_code_discount_price, '50');
        $this->assertEquals($course->whats_includes, 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate');
    }

    public function test_admin_can_edit_course()
    {
        $category = factory(CourseCategory::class)->create();

        $this->actingAs($this->createAdmin());

        $this->post('admin/courses/store', $this->validCourse($category));

        $response = $this->put('admin/courses/1/update', $this->validCourse($category,true));

        $course = Courses::latest()->first();

        $response->assertRedirect();
        $response->assertSessionHas('success');
        Storage::disk()->assertExists($course->course_image);

        $this->assertFalse($course->isActive);
        $this->assertEquals($course->course_title, 'updatedPersius delenit has cu');
    }

    public function test_admin_can_approve_course()
    {
        $course = factory(Courses::class)->create();
        $this->actingAs($this->createAdmin());

        $this->assertFalse($course->isActive);

        $response = $this->put("admin/courses/{$course->id}/approve");
        $response->assertRedirect();

        $this->assertTrue($course->fresh()->isActive);
    }

    private function validCourse($category,$update = false)
    {
        if($update){
            return [
                'course_title' => 'updatedPersius delenit has cu',
                'teacher_name' => 'Teacher name',
                'course_start' => '2018-07-07',
                'course_price' => 150,
                'course_image' => UploadedFile::fake()->image('any_image.jpg'),
                'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
                'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
                'category_id' => $category->id,
                'course_time' => '1h 30min',
                'what_will_you_learn_title' => ["Suas summo id sed erat erant oporteat", "Illud singulis indoctum ad sed", "Alterum bonorum mentitum an mel"],
                'what_will_you_learn_description' => ["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."],

                'video_title' => ["Health Science", "Health and Social Care", "Health Science", "Health and Social Care"],
                'video_category' => ["Introdocution", "Generative Modeling Review", "Variational Autoencoders", "Gaussian Mixture Model Review"],
                'video_url' => ["https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw"],
            ];
        }else{
            return [
                'course_title' => 'Persius delenit has cu',
                'teacher_name' => 'Teacher name',
                'course_start' => '2018-07-07',
                'course_price' => 150,
                'course_image' => UploadedFile::fake()->image('any_image.jpg'),
                'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
                'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
                'category_id' => $category->id,
                'course_time' => '1h 30min',
                'what_will_you_learn_title' => ["Suas summo id sed erat erant oporteat", "Illud singulis indoctum ad sed", "Alterum bonorum mentitum an mel"],
                'what_will_you_learn_description' => ["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.", "Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."],

                'video_title' => ["Health Science", "Health and Social Care", "Health Science", "Health and Social Care"],
                'video_category' => ["Introdocution", "Generative Modeling Review", "Variational Autoencoders", "Gaussian Mixture Model Review"],
                'video_url' => ["https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw", "https://www.youtube.com/watch?v=LDgd_gUcqCw"],
            ];
        }
    }
}


