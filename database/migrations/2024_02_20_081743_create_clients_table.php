<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('contact');
            $table->string('email');
            $table->string('gender');
            $table->integer('year');
            $table->integer('month');
            $table->integer('date');
            $table->integer('street_no');
            $table->string('street_address');
            $table->string('city');
            $table->tinyInteger('is_active')->default(1);
            $table->string('image_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
