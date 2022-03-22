<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BanksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'address' => $this->faker->address,
            'total_balance' => $this->faker->randomFloat(2, 0, 10000),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
