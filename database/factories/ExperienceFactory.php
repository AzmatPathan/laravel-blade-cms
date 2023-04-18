<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_name' => $this->faker->word,
            'designation' => $this->faker->word,
            'experience_from' => $this->faker->dateTimeThisMonth,
            'experience_to' => $this->faker->dateTimeThisMonth,
            'project_id' => Project::all()->random(),
        ];
    }
}
