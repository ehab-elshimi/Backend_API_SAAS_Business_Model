<?php

namespace Database\Seeders;

use App\Models\Company;
use Database\Factories\CompanyFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Company::factory()->create();

        // Seed the additional companies
        foreach (CompanyFactory::new()->additionalCompanies() as $row) {
            Company::create($row);
        }
    }
}