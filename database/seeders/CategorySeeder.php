<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array = [
            'English Language',
            'English Literature',
            'Mathematics',
            'Biology',
            'Chemistry',
            'Physics',
            'Computer Science',
            'French',
            'German',
            'Spanish',
            'History',
            'Geography',
            'Sociology',
            'Religious Education',
            'Statistics',
            'Business Studies',
            'Design and Technology',
            'Food Preparation and Nutrition',
            'Art and Design',
            'Drama',
            'Media Studies',
            'Music',
            'Physical Education'
        ];

        foreach($array as $item){
            
            DB::table('categories')->insert([
                "category"=>$item,
                "created_at"=>now(),
                "updated_at"=>now(),
            ]);
        }
    }
}
