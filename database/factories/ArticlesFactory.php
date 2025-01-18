<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articles>
 */
class ArticlesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived','pending']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }

    public function draft()
    {
        return $this->state([
            'status' => 'draft',
        ]);
    }


    public function published()
    {
        return $this->state([
            'status' => 'published',
        ]);
    }

    public function archived()
    {
        return $this->state([
            'status' => 'archived',
        ]);
    }
}
