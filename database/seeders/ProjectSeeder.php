<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\ProjectFeatures;
use App\Models\ProjectImages;
use App\Models\ProjectTechnologies;
use Database\Factories\ProjectFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed the default fake row
        Project::factory()->create();

        // Seed the related models "Project Features"
        foreach (ProjectFactory::new()->projectFeatures() as $row) {
            ProjectFeatures::create($row);
        }

        // Seed the related models "Project Images"
        foreach (ProjectFactory::new()->projectImages() as $row) {
            ProjectImages::create($row);
        }

        // Seed the related models "Project Technologies"
        foreach (ProjectFactory::new()->projectTechnologies() as $row) {
            ProjectTechnologies::create($row);
        }
    }
}