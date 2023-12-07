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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); 
            $table->string('title');
            $table->json('images')->nullable(); 
            $table->longText('description');
            $table->integer('total_calories');
            $table->time('total_time');            
            $table->enum('category', ['Breakfast', 'Lunch', 'Dinner', 'Dessert']); 
            $table->integer('is_liked')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};

