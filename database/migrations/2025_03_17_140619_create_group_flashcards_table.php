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
        Schema::create('group_flashcards', function (Blueprint $table) {
            $table->id('group_flashcard_id');
            $table->foreignId('user_flashcard_id'); // SET TO UNIQUE WHEN DEV
            $table->foreignId('category_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('visibility');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_flashcards');
    }
};
