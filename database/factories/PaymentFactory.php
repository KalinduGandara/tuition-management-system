<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->randomElement([500, 600, 700, 800, 900]),
            'date' => $this->faker->date(),
            'month' => $this->faker->monthName(),
            'type' => $this->faker->randomElement(['Online', 'Physical']),
        ];
    }
}
