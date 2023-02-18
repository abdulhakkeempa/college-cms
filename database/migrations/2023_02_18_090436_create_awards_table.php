<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('awards', function (Blueprint $table) {
            $table->id('award_id');
            $table->string('student_name');
            $table->unsignedBigInteger('course_id');
            $table->string('award_desc')->nullable();
            $table->string('batch');

            //setting the foreign key, deletes the object when particular course is deleted.
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('awards');
    }
};
