<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { 
        $period = ['1' , '7' , '30' ,'90' , '180' , '360']; 
        return [
            'amount' => $this->faker->randomFloat(1, 0, 100),
            'period' => $period[rand(0, 5)],
            'category_id' => $this->faker->numberBetween(1, 10),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
