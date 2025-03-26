<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\UserFlashcard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GroupFlashcard>
 */
class GroupFlashcardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_flashcard_id'=> UserFlashcard::inRandomOrder()->first()->user_flashcard_id,
            'category_id'=> Category::inRandomOrder()->first()->category_id,
            'name' => fake()->firstName(),
            'description' => fake()->text(),
            'visibility' => fake()->boolean(),
        ];
    }
}
