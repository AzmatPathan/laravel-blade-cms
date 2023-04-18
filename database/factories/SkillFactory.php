<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'skill_name' => $this->faker->sentence,
            'skill_desc' => $this->faker->sentence,
            'subjects' => $this->faker->paragraph,
            'user_id' => User::all()->random(),
            'project_id' => Project::all()->random(),

        ];
    }
}
