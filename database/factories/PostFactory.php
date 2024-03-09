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
        $title = fake()->text(40);
        return [
            'title' => $title,
            'slug' => str($title)->slug('-'),
            'thumbnail' => $this->faker->imageUrl(1024, 648),
            'body' => fake()->realText(5000),
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'user_id' => 1
        ];
    }
}
