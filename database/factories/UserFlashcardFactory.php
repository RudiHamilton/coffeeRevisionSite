<?php

namespace Database\Factories;

use App\Models\GroupFlashcard;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFlashcard>
 */
class UserFlashcardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->user_id,
            'group_flashcard_id'=> GroupFlashcard::inRandomOrder()->first()->group_flashcard_id,
        ];
    }
}
