<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TextWidget>
 */
class TextWidgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => str((fake()->sentence()))->slug('-'),
            'title' => fake()->sentence(),
            'image' => $this->faker->image('public/storage', 1024, 648, false),
            'content' => fake()->text(),
            'active' => fake()->boolean,
        ];
    }
}
