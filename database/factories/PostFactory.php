<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'thumbnail' =>  'https://picsum.photos/200/300',
            'status' => $this->faker->randomElement(['show', 'hide']),
            'user_id' => 1,
            'catpost_id' => 1,
        ];
    }
}
