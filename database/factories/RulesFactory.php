<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RulesFactory extends Factory
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
            'name' => $this->faker->name(),
            'amount' => $this->faker->randomFloat(2, 0, 10000),
            'category_id' => $this->faker->numberBetween(1, 10),
            'period' => $period[rand(0, 5)],
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
