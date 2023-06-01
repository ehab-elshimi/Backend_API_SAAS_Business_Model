<?php

namespace Database\Seeders;

use App\Models\Service;
use Database\Factories\ServiceFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Service::factory()->create();

        // Seed the additional fake row
        $additionalFakeRow = ServiceFactory::new()->additionalFakeRow();
        Service::create($additionalFakeRow);
    }
}