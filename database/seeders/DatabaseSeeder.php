<?php

namespace Database\Seeders;

use App\Models\MMR;
use App\Models\Rank;
use App\Models\RevisionTimeline;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'first_name' => 'Rudi',
            'second_name'=> 'Hamilton',
            'username'=>'eski',
            'email' => 'rudihamilton11@outlook.com',
            'password' => Hash::make('password'),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);

        $this->call(UserSeeder::class);
        $this->call(RankSeeder::class);
        $this->call(class: MMRSeeder::class);
        $this->call(RevisionTimelineSeeder::class);
        $this->call(RevisionTaskSeeder::class);
        $this->call(TimeWorkedSeeder::class);
        $this->call(UserFlashcardSeeder::class);
        $this->call(GroupFlashcardSeeder::class);
        $this->call(SingleFlashcardSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
    }
}
