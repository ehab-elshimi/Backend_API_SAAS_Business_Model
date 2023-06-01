<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'logo' => 'companies/corporate_finance_institute.jfif',
            'name' => 'Corporate Finance Institute',
            'link' => 'https://www.linkedin.com/school/cfieducationindia/',
            'location' => 'Delhi, India',
            'period_type' => 'multi_period',
            'developer_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }
    /**
     * Define additional fake rows states for the model.
     *
     * @return array<string, mixed>
     */
    public function additionalCompanies(): array
    {
        $companies = [
                [
                    'logo' => 'companies/megabyte_marketing_solutions.jfif',
                    'name' => 'Megabyte marketing solutions',
                    'link' => 'https://www.linkedin.com/company/megabyte-marketing-solutions/',
                    'location' => 'India',
                    'period_type' => 'one_period',
                    'developer_id' => '1',
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                ]
        ];
        return $companies;
    }
}