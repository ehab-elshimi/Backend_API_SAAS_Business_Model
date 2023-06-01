<?php

namespace Database\Factories;

use App\Models\ProjectFeatures;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'intro_image' => 'projects/intro_images/alshark.png',
            'title' => 'Al Shark For Cereals and plants',
            'desc' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            'source_code_link' => 'https://github.com/ehab-elshimi/alshark',
            'pdf_docs_url' => 'https://drive.google.com/file/d/1ZmiAfaAyQk_KNZOo0nV1zyrHH0ncM7fL/view?usp=sharing',
            'is_displayed' => '1',
            'developer_id' => '1',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }
    /**
     * Define related models fake states for the model.
     *
     * @return array<string, mixed>
     */
    public function projectFeatures(): array
    {
        $projectFeatures = [
            [
                'project_id' => '1',
                'feature_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'project_id' => '1',
                'feature_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];
        return $projectFeatures;
    }
    public function projectImages(): array
    {
        $projectImages = [
            [
                'project_id' => '1',
                'image' => 'projects/intro_images/alshark.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'project_id' => '1',
                'image' => 'projects/intro_images/alshark.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'project_id' => '1',
                'image' => 'projects/intro_images/alshark.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'project_id' => '1',
                'image' => 'projects/intro_images/alshark.png',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];
        return $projectImages;
    }
    public function projectTechnologies(): array
    {
        $projectTechnologies = [
            [
                'project_id' => '1',
                'technology_id' => '1',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'project_id' => '1',
                'technology_id' => '2',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ];
        return $projectTechnologies;
    }
}