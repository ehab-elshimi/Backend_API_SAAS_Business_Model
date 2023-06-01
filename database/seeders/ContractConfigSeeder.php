<?php

namespace Database\Seeders;

use App\Models\EmailConfiguration;
use Database\Factories\ContractConfigFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContractConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Web::factory()->create();

        // Seed the email configuration of contract "email gateway like Mail Trap" 
        EmailConfiguration::create(ContractConfigFactory::new()->emailConfig());
    }
}