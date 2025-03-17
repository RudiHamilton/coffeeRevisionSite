<?php

namespace Database\Factories;

use App\Models\GroupFlashcard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SingleFlashcard>
 */
class SingleFlashcardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group_flashcard_id' => GroupFlashcard::inRandomOrder()->first()->group_flashcard_id,
            'name'=> fake()->firstName(),
            'question'=> fake()->text(),
            'answer'=> fake()->text(),
        ];
    }
}
