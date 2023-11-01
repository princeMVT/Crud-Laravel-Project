<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

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
        'name' => $this->faker->name,
        'email' => $this->faker->unique()->safeEmail, 
        'address' => $this->faker->address,
        'country' => $this->faker->country,
        'city' => $this->faker->city,
        'pincode' => str_replace("-", "", $this->faker->postcode())
        ];
}

}
