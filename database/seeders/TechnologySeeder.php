<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Technology::factory()->create();

        // Seed the unlimited fake rows not in consideration
        $additionalFakeRows = [
            [
                'icon' => 'fa-brands fa-laravel',
                'technology' => 'Laravel',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'icon' => 'fa-brands fa-bootstrap',
                'technology' => 'Bootstrap',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];

        foreach ($additionalFakeRows as $row) {
            Technology::create($row);
        }
    }
}