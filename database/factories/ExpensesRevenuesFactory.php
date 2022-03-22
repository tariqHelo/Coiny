<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ExpensesRevenuesFactory extends Factory
{   
     
    public function definition()
    {   
       // dd(20);
      
        $type = ['expenses' , 'revenues'];

        return [
            'category_id' => $this->faker->numberBetween(1, 10),
            'amount' => $this->faker->numberBetween(0, 100),
            'note' => $this->faker->text(),
            'type' => $type[rand(0, 1)],
            'user_id' => $this->faker->numberBetween(1, 10), 
        ];
    }

}
