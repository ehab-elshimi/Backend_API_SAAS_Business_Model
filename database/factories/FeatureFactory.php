<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature' => 'Experience with RESTful APIs and CRUD systems.',
            'feature_types' => 'backend',
            'developer_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }
    /**
     * Define additional fake states for the model.
     *
     * @return array<string, mixed>
     */
    public function additionalFakeRow(): array
    {
        return [
            'feature' => 'Ensure HTML, CSS, and shared JavaScript is valid and consistent across applications',
            'feature_types' => 'frontend',
            'developer_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }

}