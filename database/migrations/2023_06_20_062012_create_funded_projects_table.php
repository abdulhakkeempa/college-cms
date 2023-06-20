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
        Schema::create('funded_projects', function (Blueprint $table) {
            $table->id('funded_project_id');
            $table->string('researcher');
            $table->string('role');
            $table->string('project',);
            $table->string('funding_agency');
            $table->string('status');
            $table->decimal('amount', 10, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funded_projects');
    }
};
