<?php

namespace Database\Factories;

use App\Model\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "email" => $this->faker->email(),
            "address" => $this->faker->address(),
            "city" => $this->faker->city(),
            "province" => $this->faker->stateAbbr(),
            "cap" => $this->faker->postcode(),
        ];
    }
}
