<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SolPr>
 */
class SolPrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "submission_date" => fake()->dateTimeBetween('-3 months', 'now'),
            "name" => fake() ->name(),
            "email" => fake()->unique()->safeEmail(),
            "points" => fake() -> optional()->numberBetween(0, 10),
            "evaluation_time" => fake() -> optional() ->dateTimeBetween('-2 months', 'now'),
            "solution" => fake() -> text(200),
        ];
    }
}
