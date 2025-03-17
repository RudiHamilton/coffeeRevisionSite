<?php

namespace Database\Seeders;

use App\Models\TimeWorked;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimeWorkedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TimeWorked::factory(10)->create(); 
    }
}
