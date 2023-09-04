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
        Schema::create('pet_vaccination', function (Blueprint $table) {
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('vaccination_id');

            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('vaccination_id')->references('id')->on('vaccinations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pet_vaccination');
    }
};
