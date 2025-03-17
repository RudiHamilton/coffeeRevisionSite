<?php

namespace Database\Seeders;

use App\Models\UserFlashcard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserFlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFlashcard::factory(10)->create(); 
    }
}
