<?php

namespace Database\Seeders;

use App\Models\MMR;
use App\Models\Rank;
use App\Models\RevisionTimeline;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            
        ]);

        $this->call(UserSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(class: MMRSeeder::class);
        $this->call(RevisionTimelineSeeder::class);
        $this->call(RevisionTaskSeeder::class);
        $this->call(TimeWorkedSeeder::class);
        $this->call(GroupFlashcardSeeder::class);
        $this->call(SingleFlashcardSeeder::class);
        $this->call(UserFlashcardSeeder::class);
    }
}
