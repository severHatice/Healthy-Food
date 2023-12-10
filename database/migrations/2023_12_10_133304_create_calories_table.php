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
        Schema::create('calories', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id");
            $table->string("food_item");
            $table->integer("calories_number");
            $table->string("date");
            $table->string("time");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calories');
    }
};
