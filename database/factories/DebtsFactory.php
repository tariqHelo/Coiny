<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DebtsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = ['Debitor' , 'Creditor'];
        return [
            'name' => $this->faker->name,
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'type' => $type[rand(0, 1)],
            'user_id' => $this->faker->numberBetween(1, 10), 
        ];
    }
}
