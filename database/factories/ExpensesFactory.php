<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExpensesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {    
       // dd(20);
         return [
            'amount' => $this->faker->randomFloat(1, 0, 1000),
            'note' => $this->faker->text(),
            'type' => 'expenses',
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ]; 
    }
}
