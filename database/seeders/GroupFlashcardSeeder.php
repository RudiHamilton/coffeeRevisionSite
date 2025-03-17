<?php

namespace Database\Seeders;

use App\Models\GroupFlashcard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupFlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GroupFlashcard::factory(10)->create(); 
    }
}
