<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'post_title' => fake()->sentence(),
            'caption' => fake()->sentence(),
            'img_path' => fake()->lexify('?:\\') . implode('\\', fake()->words(fake()->numberBetween(0, 4))),
            'users_id' => fake()->numberBetween(1,50)   //Assigning the post to random user for testing
        ];
    }
}
