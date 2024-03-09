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

        $body = '';
        for ($i = 0; $i < 5; $i++) {
            $body .= '<p>' . fake()->paragraph(5) . '</p>';
        }

        return [
            'title' => $title,
            'slug' => str($title)->slug('-'),
            'thumbnail' => $this->faker->image('public/storage', 1024, 648, false),
            'body' => $body,
            'active' => fake()->boolean,
            'published_at' => fake()->dateTime,
            'user_id' => 1
        ];
    }
}
