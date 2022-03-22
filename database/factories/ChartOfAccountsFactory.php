<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChartOfAccountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {  
        $type =['Assets' , 'Equity' , 'Revenues' , 'Expenses'];

        return [
            'name' => $this->faker->word(),
            'parent_id' => $this->faker->numberBetween(1, 10),
            'type' => $type[rand(0, 3)],
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
