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
        Schema::create('placements', function (Blueprint $table) {
            $table->id('placement_id');
            $table->string('student_name');
            $table->unsignedBigInteger('course_id');
            $table->string('batch');
            $table->string('company');
            $table->string('job_role')->nullable();

            //setting the foreign key, deletes the object when particular course is deleted.
            $table->foreign('course_id')->references('album_id')->on('courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('placements');
    }
};
