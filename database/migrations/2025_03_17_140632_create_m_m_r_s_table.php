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
        Schema::create('m_m_r_s', function (Blueprint $table) {
            $table->id('mmr_id');
            $table->foreignId('rank_id');
            $table->foreignId('user_id');
            $table->integer('mmr_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_m_r_s');
    }
};
