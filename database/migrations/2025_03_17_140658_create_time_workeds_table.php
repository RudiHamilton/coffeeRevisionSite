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
        Schema::create('time_workeds', function (Blueprint $table) {
            $table->id('time_worked_id');
            $table->foreignId('user_id');
            $table->time('pomodoro_time')->nullable();
            $table->time('flashcard_time')->nullable();
            $table->time('revision_time')->nullable();
            $table->time('overall_time')->nullable(); //this is used to calculate the mmr
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_workeds');
    }
};
