<?php

namespace Database\Factories;

use App\Models\Stadium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimeSlot>
 */
class TimeSlotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stadium_id' => Stadium::factory(),
            'day_of_week' => fake()->numberBetween(0, 6),
            'start_time' => fake()->time('H:00:00'),
            'end_time' => fake()->time('H:00:00'),
        ];
    }
}
