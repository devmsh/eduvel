<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admissions', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('firstname');
            // $table->string('lastname');
            // $table->string('email')->unique();
            // $table->string('password');
            $table->string('user_uniqid');
            /*$table->foreign('user_uniqid')
                  ->references('uniqid')->on('users')
                  ->onDelete('cascade');*/
            // $table->integer('user_uniqid');
            $table->string('telephone');
            $table->string('age');
            // $table->string('educational_status');
            $table->string('education_level');
            $table->string('gender');
            $table->string('address');
            $table->string('city');
            $table->string('zipcode');
            $table->string('country');
            $table->string('preferences')->nullable();
            $table->text('messagere_here');
            $table->string('terms');
            // $table->rememberToken();
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
        Schema::dropIfExists('admissions');
    }
}
