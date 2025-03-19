<?php

namespace Database\Factories;

use App\Models\RevisionTimeline;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RevisionTask>
 */
class RevisionTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'revision_timeline_id' => RevisionTimeline::inRandomOrder()->first()->revision_timeline_id,
            'name' => fake()->firstName(),
            'description' => fake()->text(),
            'start_time'=> fake()->dateTime(),
            'finish_time'=> fake()->dateTime(),
            'completed' => fake()->boolean(),
        ];
    }
}
