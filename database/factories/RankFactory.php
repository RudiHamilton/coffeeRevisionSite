<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rank>
 */
class RankFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rank'=>fake()->randomElement([
                'Bronze',
                'Silver',
                'Gold',
                'Platinum',
                'Diamond',
                'Master',
                'Grandmaster',
                'Eternus'
            ]),

            //This is placeholder till the coffeecup rank icons have been made.
            //Will be swapped with file directories
            'rank_icon'=>fake()->randomElement([
                'Bronze',
                'Silver',
                'Gold',
                'Platinum',
                'Diamond',
                'Master',
                'Grandmaster',
                'Eternus'
            ]),
        ];
    }
}
