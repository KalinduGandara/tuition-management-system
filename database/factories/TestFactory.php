<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tuition_class_id' => $this->faker->numberBetween(1, 10),
            'date' => $this->faker->date(),
            'type' => $this->faker->randomElement(['Multiple Master', 'Lesson Test Master', 'Team Test Master']),
        ];
    }
}
