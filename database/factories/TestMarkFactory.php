<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TestMark>
 */
class TestMarkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'test_id' => $this->faker->numberBetween(1, 10),
            'registration_id' => $this->faker->numberBetween(1, 10),
            'mark' => $this->faker->numberBetween(0, 100),
        ];
    }
}
