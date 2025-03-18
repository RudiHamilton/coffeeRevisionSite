<?php

namespace Database\Seeders;

use App\Models\Rank;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('ranks')->insert([
            'rank' => 'Bronze',
            'rank_icon'=> 'Bronze',
            'rank_range_start'=>0,
            'rank_range_end'=>249,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Silver',
            'rank_icon'=> 'Silver',
            'rank_range_start'=>250,
            'rank_range_end'=>499,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
         DB::table('ranks')->insert([
            'rank' => 'Gold',
            'rank_icon'=> 'Gold',
            'rank_range_start'=>500,
            'rank_range_end'=>749,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Platinum',
            'rank_icon'=> 'Platinum',
            'rank_range_start'=>750,
            'rank_range_end'=>999,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Diamond',
            'rank_icon'=> 'Diamond',
            'rank_range_start'=>1000,
            'rank_range_end'=>1249,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Master',
            'rank_icon'=> 'Master',
            'rank_range_start'=>1250,
            'rank_range_end'=>1499,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Grandmaster',
            'rank_icon'=> 'Grandmaster',
            'rank_range_start'=>1500,
            'rank_range_end'=>1749,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('ranks')->insert([
            'rank' => 'Eternus',
            'rank_icon'=> 'Eternus',
            'rank_range_start'=>1749,
            'rank_range_end'=>2500,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
