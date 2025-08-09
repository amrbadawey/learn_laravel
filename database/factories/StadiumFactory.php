<?php

namespace Database\Factories;

use App\Models\Club;
use App\Models\SportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->streetName(),
            'club_id' => Club::factory(),
            'sport_type_id' => SportType::factory(),
        ];
    }
}
