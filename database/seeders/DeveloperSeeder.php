<?php

namespace Database\Seeders;

use App\Models\Developer;
use Database\Factories\DeveloperFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Developer::factory()->create();

        // Seed the additional fake row
        $additionalFakeRow = DeveloperFactory::new()->additionalFakeRow();
        Developer::create($additionalFakeRow);
    }
}