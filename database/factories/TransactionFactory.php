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
       // $type = ['expenses' , 'revenues'];
        return [
            'total' => $this->faker->randomFloat(2, 0, 1000),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
