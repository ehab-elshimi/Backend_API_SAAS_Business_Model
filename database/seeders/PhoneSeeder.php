<?php

namespace Database\Seeders;

use App\Models\Phone;
use Database\Factories\PhoneFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Phone::factory()->create();

        // Seed the additional fake row
        $additionalFakeRow = PhoneFactory::new()->additionalFakeRow();
        Phone::create($additionalFakeRow);
    }
}