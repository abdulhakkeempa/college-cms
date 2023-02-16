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
        Schema::create('album_cover', function (Blueprint $table) {
            $table->unsignedBigInteger('album_id')->unique();
            $table->unsignedBigInteger('photo_id')->nullable();

            //setting the foreign key
            $table->foreign('album_id')->references('album_id')->on('albums')->onDelete('cascade');
            $table->foreign('photo_id')->references('photo_id')->on('photos')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_cover');
    }
};
