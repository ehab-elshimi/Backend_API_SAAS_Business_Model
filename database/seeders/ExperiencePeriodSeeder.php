<?php

namespace Database\Seeders;

use App\Models\ExperiencePeriod;
use Database\Factories\ExperiencePeriodFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperiencePeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// Seed the default fake row
        ExperiencePeriod::factory()->create();

        // Seed the additional companies
        foreach (ExperiencePeriodFactory::new()->additionalExperiencePeriods() as $row) {
            ExperiencePeriod::create($row);
        }
    }
}