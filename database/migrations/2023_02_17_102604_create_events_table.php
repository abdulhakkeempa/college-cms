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
        Schema::create('events', function (Blueprint $table) {
            $table->id('event_id');
            $table->string('event_title');
            $table->string('event_desc',200)->nullable();
            $table->date('event_date')->nullable();
            $table->unsignedBigInteger('cover_img_id')->nullable();

            //setting the foreign key
            $table->foreign('cover_img_id')->references('photo_id')->on('photos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
