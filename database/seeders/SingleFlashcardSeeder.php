<?php

namespace Database\Seeders;

use App\Models\SingleFlashcard;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SingleFlashcardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SingleFlashcard::factory(10)->create(); 
    }
}
