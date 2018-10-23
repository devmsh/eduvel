<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('course_title');
            $table->string('teacher_name');
            $table->date('course_start');
            $table->date('course_expire')->nullable();
            $table->string('course_price');
            $table->string('course_discount_price')->nullable();
            $table->string('course_image');
            $table->string('course_video');
            $table->text('course_description');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')
                ->references('id')
                ->on('course_categories');
            $table->string('coupon_code')->nullable();
            $table->string('coupon_code_discount_price')->nullable();
            $table->text('whats_includes')->nullable();
            $table->integer('isActive')->default(0)->nullable();
            $table->string('course_time');
            $table->text('what_will_you_learn_title');
            $table->text('what_will_you_learn_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
