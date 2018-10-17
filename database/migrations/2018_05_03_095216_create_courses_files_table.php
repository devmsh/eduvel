<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_files', function (Blueprint $table) {
            $table->increments('id');
            $table->text('video_title');
            $table->text('video_category');
            $table->text('video_url');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')
                    ->references('id')
                    ->on('courses');
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
        Schema::dropIfExists('courses_files');
    }
}
