<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'icon' => 'fa-brands fa-aws',
            'title' => 'aws',
            'description' => 'I Can Develop Services For AWS For U',
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
            'icon' => 'fa-brands fa-aws',
            'title' => 'aws 2',
            'description' => 'I Can Develop Services For AWS 2 For U',
            'developer_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }
}