<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeWorked>
 */
class TimeWorkedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=> User::inRandomOrder()->first()->user_id,
            'pomodoro_time' => fake()->time(),
            'flashcard_time'=> fake()->time(),
            'revision_time'=> fake()->time(),
            'overall_time'=> fake()->time(),
        ];
    }
}
