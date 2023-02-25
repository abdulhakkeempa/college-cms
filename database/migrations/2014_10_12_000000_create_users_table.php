<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->default(Hash::make(env("USER_DEFAULT_PASSWORD")));
            $table->string('designation');
            $table->string('iqac')->nullable();
            $table->string('portfolio')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('profile_picture')->nullable();
            $table->date('joined_year');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
