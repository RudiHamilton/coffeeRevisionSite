<?php

namespace Database\Seeders;

use App\Models\RevisionTask;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevisionTaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RevisionTask::factory(10)->create(); 
    }
}
