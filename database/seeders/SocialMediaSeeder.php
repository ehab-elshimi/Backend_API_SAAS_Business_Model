<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        SocialMedia::factory()->create();

        // Seed the unlimited fake rows not in consideration
        $additionalFakeRows = [
            [
                'icon' => 'fa-brands fa-github',
                'link' => 'https://github.com/ehab-elshimi?tab=repositories',
                'developer_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'icon' => 'fa-brands fa-facebook></i>',
                'link' => 'https://www.facebook.com/profile.php?id=100009582435617',
                'developer_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];

        foreach ($additionalFakeRows as $row) {
            SocialMedia::create($row);
        }
    }
}