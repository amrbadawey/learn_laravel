<?php

namespace Database\Seeders;

use App\Models\SportType;
use Illuminate\Database\Seeder;

class SportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SportType::factory()->create(['name' => 'Football']);
        SportType::factory()->create(['name' => 'Padel']);
        SportType::factory()->create(['name' => 'Tennis']);
    }
}
