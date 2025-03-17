<?php

namespace Database\Seeders;

use App\Models\MMR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MMRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MMR::factory(10)->create(); 
    }
}
