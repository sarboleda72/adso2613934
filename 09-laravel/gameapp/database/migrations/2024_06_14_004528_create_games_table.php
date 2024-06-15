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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('image')->default('no-game.png');
            $table->string('developer');
            $table->date('releasedate');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('price');
            $table->string('genre');
            $table->boolean('slider')->default(0);
            $table->string('description');
            $table->timestamps();
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
