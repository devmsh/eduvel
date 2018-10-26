<?php

use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Courses::class, 6)->create();
        App\Course::create([

            'user_id' => '2',
            'course_title' => 'Persius delenit has cu',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 150,
            'course_discount_price' => 50,
            'course_image' => 'course__list_1.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '1',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);

        App\Course::create([

            'user_id' => '2',
            'course_title' => 'At deseruisse scriptorem',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 90,
            'course_discount_price' => 50,
            'course_image' => 'course__list_2.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '2',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);

        App\Course::create([

            'user_id' => '2',
            'course_title' => 'Ea vel semper quaerendum',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 300,
            'course_discount_price' => 50,
            'course_image' => 'course__list_3.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '3',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);

        App\Course::create([

            'user_id' => '2',
            'course_title' => 'Ei has exerci graecis',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 850,
            'course_discount_price' => 50,
            'course_image' => 'course__list_4.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '4',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);

        App\Course::create([

            'user_id' => '2',
            'course_title' => 'Decore tractatos',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 220,
            'course_discount_price' => 50,
            'course_image' => 'course__list_5.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '5',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);

        App\Course::create([

            'user_id' => '2',
            'course_title' => 'Eam id legimus torquatos',
            'teacher_name' => 'Teacher name',
            'course_start' => '2018-07-07',
            'course_expire' => '2018-08-08',
            'course_price' => 120,
            'course_discount_price' => 50,
            'course_image' => 'course__list_6.jpg',
            'course_video' => 'https://www.youtube.com/watch?v=LDgd_gUcqCw',
            'course_description' => 'Per consequat adolescens ex, cu nibh commune temporibus vim, ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.',
            'category_id' => '6',
            'coupon_code' => 'coupon code',
            'coupon_code_discount_price' => '50',
            'whats_includes' => 'Mobile support, Lesson archive, Mobile support, Tutor chat, Course certificate',
            'isActive' => 1,
            'course_time' => '1h 30min',
            'what_will_you_learn_title' => '["Suas summo id sed erat erant oporteat","Illud singulis indoctum ad sed","Alterum bonorum mentitum an mel"]',
            'what_will_you_learn_description' => '["Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus.","Ut unum diceret eos, mel cu velit principes, ut quo inani dolorem mediocritatem. Mea in justo posidonium necessitatibus."]'
        ]);
    }
}
