<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubjectPr>
 */
class SubjectPrFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjectKeywords = [
            'Mathematics', 'Physics', 'Chemistry', 'Biology',
            'History', 'Geography', 'Sociology', 'Psychology',
            'Economics', 'Political Science', 'Philosophy', 'Literature',
            'Computer Science', 'Engineering', 'Anthropology', 'Art',
        ];

        $title = implode(' ', fake()->randomElements($subjectKeywords));

        return [
            "title" => $title,
            "description" => fake()->optional()->paragraph(),
            "code" => fake() -> regexify('IK-[A-Z]{3}\d{3}'),
            "credit" => fake() -> numberBetween(2, 7),
        ];
    }
}
