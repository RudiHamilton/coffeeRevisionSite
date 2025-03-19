<?php

namespace Database\Factories;

use App\Models\Rank;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MMR>
 */
class MMRFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rank_id' => Rank::inRandomOrder()->first()->rank_id,
            'user_id' => User::inRandomOrder()->first()->user_id,
            'mmr_number' => fake()->randomNumber(3,false),
        ];
    }
}
