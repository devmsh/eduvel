<?php

use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\CourseCategory::class, 6)->create();
        App\CourseCategory::create(['name' => 'Arts and Humanities', 'image' => 'course_1.jpg']);
        App\CourseCategory::create(['name' => 'Engineering', 'image' => 'course_2.jpg']);
        App\CourseCategory::create(['name' => 'Architecture', 'image' => 'course_3.jpg']);
        App\CourseCategory::create(['name' => 'Science and Biology', 'image' => 'course_4.jpg']);
        App\CourseCategory::create(['name' => 'Law and Criminology', 'image' => 'course_5.jpg']);
        App\CourseCategory::create(['name' => 'Medical', 'image' => 'course_6.jpg']);
    }
}
