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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('pet_id');
            $table->string('pet_name');
            $table->string('owner_name');
            $table->enum('gender',['male','female'])->default('male');
            $table->string('phone_number');
            $table->string('city');
            $table->string('status_id');
            $table->string('breed_id');
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('township');
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
        Schema::dropIfExists('patients');
    }
};
