<?php

namespace Database\Seeders;

use App\Models\RevisionTimeline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RevisionTimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RevisionTimeline::factory(10)->create(); 
    }
}
