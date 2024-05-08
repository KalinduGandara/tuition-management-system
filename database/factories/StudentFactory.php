<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'student_index' => $this->faker->unique()->randomNumber(5),
            'address' => $this->faker->address(),
            'whatsapp_no' => $this->faker->phoneNumber(),
            'mother_name' => $this->faker->name(),
            'mother_phone' => $this->faker->phoneNumber(),
            'mother_occupation' => $this->faker->jobTitle(),
            'father_name' => $this->faker->name(),
            'father_phone' => $this->faker->phoneNumber(),
            'father_occupation' => $this->faker->jobTitle(),
        ];
    }
}
