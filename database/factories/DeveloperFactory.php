<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Developer>
 */
class DeveloperFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => 'Ehab',
            'last_name' => 'Elshimi',
            'formal_name' => 'Ehab Kamal Kamel Amin',
            'email' => 'ehab.devloper.email@gmail.com',
            'address' => 'New Cairo, Cairo, Egypt',
            'location_url'=>'https://goo.gl/maps/9ZTt3cmHRo6Bd9Eg9',
            'cv_link_drive' => 'https://drive.google.com/file/d/1_8fJj6ee92dL-dun5b819dpGQPzxsnh9/view?usp=sharing',
            'user_id' => '1',
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
            'first_name' => 'Ehab2',
            'last_name' => 'Elshimi2',
            'formal_name' => 'Ehab Kamal Kamel Amin2',
            'email' => 'ehab.devloper.email@gmail.com2',
            'address' => 'New Cairo, Cairo, Egypt2',
            'location_url' => 'https://goo.gl/maps/9ZTt3cmHRo6Bd9Eg9',
            'cv_link_drive' => 'https://drive.google.com/file/d/1_8fJj6ee92dL-dun5b819dpGQPzxsnh9/view?usp=sharing',
            'user_id' => '2',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ];
    }
}