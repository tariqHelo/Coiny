<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $type = ['expenses' , 'revenues'];
        return [
            'total' => $this->faker->randomFloat(4, 0, 10000),
            'type' => $type[rand(0, 1)],
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
