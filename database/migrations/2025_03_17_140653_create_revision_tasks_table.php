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
        Schema::create('revision_tasks', function (Blueprint $table) {
            $table->id('revision_task_id');
            $table->foreignId('revision_timeline_id');
            $table->string('name');
            $table->text('description');
            $table->dateTime('start_time');
            $table->dateTime('finish_time');
            $table->boolean('completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revision_tasks');
    }
};
