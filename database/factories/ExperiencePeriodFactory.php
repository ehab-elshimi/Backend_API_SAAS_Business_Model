<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ExperiencePeriod>
 */
class ExperiencePeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'job_title' => 'Manager - Growth and strategy',
                'from_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2021-05-10'), //->format('M Y')  "Jun 2023"
                'to_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2023-05-30'),
                'job_distance_type' => 'remote',
                'job_time_type' => 'Part Time',
                'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'company_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
        ];
    }
    /**
     * Define additional fake rows states for the model.
     *
     * @return array<string, mixed>
     */
    public function additionalExperiencePeriods(): array
    {
        $additionalExperiencePeriods = [
            [
                'job_title' => 'Finance Content Strategist',
                'from_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2022-12-10'), //->format('M Y')  "Jun 2023"
                'to_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2023-05-30'),
                'job_distance_type' => 'onsite',
                'job_time_type' => 'Full Time',
                'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'company_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'job_title' => 'Vice President (HR & Operations)',
                'from_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2022-05-30'), //->format('M Y')  "Jun 2023"
                'to_date' => \Carbon\Carbon::createFromFormat('Y-m-d', '2022-06-30'),
                'job_distance_type' => 'onsite',
                'job_time_type' => 'Part Time',
                'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                'company_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],

        ];
        return $additionalExperiencePeriods;
    }
}