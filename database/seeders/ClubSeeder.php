<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\Stadium;
use App\Models\TimeSlot;
use App\Models\SportType;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sportTypes = SportType::all();

        Club::factory(5)
            ->has(
                Stadium::factory(3)
                    ->sequence(fn ($sequence) => ['sport_type_id' => $sportTypes->random()->id])
                    ->has(TimeSlot::factory(5)->sequence(fn ($sequence) => ['day_of_week' => $sequence->index % 7]))
            )
            ->create();
    }
}
