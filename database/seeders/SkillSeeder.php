<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Skill::factory()->create();

        // Seed the unlimited fake rows not in consideration
        $additionalFakeRows = [
            [
                'skill' => 'Critical Thinking',
                'type' => 'Soft Skill',
                'developer_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'skill' => 'figma',
                'type' => 'Technical Skill',
                'developer_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'skill' => 'patient',
                'type' => 'Soft Skill',
                'developer_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];

        foreach ($additionalFakeRows as $row) {
            Skill::create($row);
        }
    }
}