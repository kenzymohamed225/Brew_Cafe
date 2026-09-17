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
    Schema::create('abouts', function (Blueprint $table) {
        $table->id();
        $table->string('title')->default('From a Small Coffee Cart to Your Favorite Daily Spot');
        $table->text('story_p1');
        $table->text('story_p2');
        $table->string('organic_beans')->default('100%');
        $table->string('coffee_blends')->default('15+');
        $table->string('happy_guests')->default('50K+');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
