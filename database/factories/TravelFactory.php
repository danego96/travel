<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Travel>
 */
class TravelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->country();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text(100),
            'number_of_days' => $this->faker->numberBetween(1, 30),
            'is_public' => $this->faker->boolean(),
        ];
    }
}