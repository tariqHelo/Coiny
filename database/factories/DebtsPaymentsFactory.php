<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DebtsPaymentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'debt_id' => $this->faker->numberBetween(1, 10), 
        ];
    }
}
