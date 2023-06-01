<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DeveloperSeeder::class,
            PhoneSeeder::class,
            ServiceSeeder::class,
            SkillSeeder::class,
            SocialMediaSeeder::class,
            FeatureSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
            CompanySeeder::class,
            ExperiencePeriodSeeder::class,
            EmailSeeder::class,
            ContractConfigSeeder::class,
        ]);
    }
}