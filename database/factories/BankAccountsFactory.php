<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BankAccountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {    
        //dd(20);
        $type = ['Current', 'Savings']; 
        return [
            'currency' => $this->faker->currencyCode,
            'amount' => $this->faker->randomFloat(1, 0, 100),
            'type' =>  $type[rand(0, 1)],
            'bank_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
