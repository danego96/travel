<?php

namespace Database\Factories;

use App\Models\Travel;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startingDate = $this->faker->date();
        $carbonStaringDate = Carbon::parse($startingDate);

        return [
            'name' => $this->faker->unique()->city(),
            'travel_id' => Travel::inRandomOrder()->value('id'),
            'starting_date' => $startingDate,
            'ending_date' => $carbonStaringDate->copy()->addDays(random_int(3,14)),
            'price' => $this->faker->randomFloat(2, 10, 999),
        ];
    }
}
//'starting_date',
//'ending_date',
//'price',