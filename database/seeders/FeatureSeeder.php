<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Feature;
use Database\Factories\FeatureFactory;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Feature::factory()->create();

        // Seed the additional fake row
        $additionalFakeRow = FeatureFactory::new()->additionalFakeRow();
        Feature::create($additionalFakeRow);

        // Seed the unlimited fake rows not in consideration
        $additionalFakeRows = [
            [
                'feature' => 'Excellent communication and teamwork abilities.',
                'feature_types' => 'other',
                'developer_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'feature' => 'Experience with version control systems (e.g., Git).',
                'feature_types' => 'backend',
                'developer_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'feature' => 'Document features, technical specifications & infrastructure Responsibilities',
                'feature_types' => 'other',
                'developer_id' => '1',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($additionalFakeRows as $row) {
            Feature::create($row);
        }
    }
}