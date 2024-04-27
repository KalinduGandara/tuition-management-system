<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TuitionClass>
 */
class TuitionClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'center_id' => $this->faker->numberBetween(1, 10),
            'grade' => $this->faker->randomElement(['11', '10', '9', '8', '7', '6']),
            'year' => $this->faker->year(),
        ];
    }
}
