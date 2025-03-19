<?php

namespace Database\Seeders;

use App\Models\MMR;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MMRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_m_r_s')->insert([
            'rank_id' => 8,
            'user_id'=>1,
            'mmr_number'=> 2400,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);
        MMR::factory(10)->create(); 
    }
}
