<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Faker\Generator as Faker;
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
    public function definition(Faker $faker)
    {
        return [
            'title' => $title = $faker->sentence,
            'url' => Str::slug($title),
            'description' => $faker->paragraph
        ];
    }
}
